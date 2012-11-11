<?php
/* @var $this TopicController */
/* @var $model BKTopic */

$this->breadcrumbs=array(
    Yii::app()->name=>array('/site'),
    'Forums'=>array('forum/index'),
    CHtml::encode(BKHelper::truncateString($model->forum->title))=>array('forum/view','id'=>$model->forum->id),
    CHtml::encode(BKHelper::truncateString($model->title))
);

$this->menu=array(
    array('label'=>'List Forums', 'url'=>array('forum/index')),
    array('label'=>'Back to Forum', 'url'=>array('forum/view', 'id'=>$model->forum->id)),
	array(
        'label'=>'Create Topic',
        'url'=>array('create', 'forumID'=>$model->forum->id),
	    'visible'=>Yii::app()->user->checkAccess('user')
    ),
	array(
        'label'=>'Update Topic',
        'url'=>array('update', 'id'=>$model->id),
	    'visible'=>Yii::app()->user->checkAccess('moderator')
    ),
	array(
        'label'=>'Delete Topic',
        'url'=>'#',
        'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),
        'confirm'=>'Are you sure you want to delete this item?'),
        'visible'=>Yii::app()->user->checkAccess('moderator')
    ),
/*	array(
        'label'=>'Manage Topics',
        'url'=>array('admin'),
	    'visible'=>Yii::app()->user->checkAccess('moderator')
    ),*/
    array('label'=>Yii::t('main','Posts'),'itemOptions'=>array('class'=>'nav-header')),
    array(
        'label'=>'Create Post',
        'url'=>array('post/create', 'topicID'=>$model->id),
        'visible'=>Yii::app()->user->checkAccess('user')
    ),
);
$this->pageTitle = CHtml::encode($model->title);
?>

<header><h3><?php echo $this->pageTitle; ?></h3></header>

<header><em><?php echo CHtml::encode($model->description) ?></em></header>

<?php $this->widget('zii.widgets.CListView', array(
    'id'=>'post-list',
	'dataProvider'=>$posts,
    'itemView'=>'application.modules.forum.views.post._view',
    'summaryText'=>'',
    'emptyText'=>Yii::t('main','No posts yet.'),
    'pager'=>array(
        'header'=>'',
    )
)); ?>

<h4 class="pad_20"><?php echo Yii::t('main','Post Comment');  ?></h4>

<?php
    if (Yii::app()->user->checkAccess('user'))
        echo $this->renderPartial('forum.views.post._form', array('model'=>$form, 'topic'=>$model));
    else
        echo CHtml::link(Yii::t('main','New Post'), array('/forum/post/create', 'topicID'=>$model->id),
            array('class'=>'btn btn-primary btn-toolbar'));
?>
