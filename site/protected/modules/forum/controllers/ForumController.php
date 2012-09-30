<?php

/**
 * ForumController
 *
 * @author f0t0n; Alexey kavshirko@gmail.com
 *
 */
class ForumController extends BaseForumController
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        /*
         * Example of creating of new user model:
         *
         * $user = BKUser::create();
         * $user->username = 'Jimmy Winter';
         * $user->email = 'jimmy.winter@gmail.com';
         * $user->password = 'password_of_jimmy_winter';
         *
         * CVarDumper::dump($user, 100, true);
         *
         * Really it will not needed in this module.
         *
         *
         */
        /*$user = BKUser::create();
        $user->username = 'Jimmy Winter';
        $user->email = 'jimmy.winter@gmail.com';
        $user->password = 'password_of_jimmy_winter';
        CVarDumper::dump($user->repr(), 100, true);
        */

        $dataProvider = new CActiveDataProvider('BKForum');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);

        $topics = new CActiveDataProvider('BKTopic',
            array('criteria' => array(
                'condition' => 'forum_id=:forum_id',
                'params' => array(':forum_id' => $model->id)
            ))
        );
        $this->render('view', array(
            'topics' => $topics,
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new BKForum;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BKForum'])) {
            $model->attributes = $_POST['BKForum'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['BKForum'])) {
            $model->attributes = $_POST['BKForum'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new BKForum('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['BKForum']))
            $model->attributes = $_GET['BKForum'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = BKForum::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bkforum-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
