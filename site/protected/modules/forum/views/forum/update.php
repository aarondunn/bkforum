<?php
/* @var $this ForumController */
/* @var $model BKForum */
$this->breadcrumbs=array(
    Yii::app()->name=>array('/site'),
    'Forums'=>array('index'),
    CHtml::encode(Helper::truncateString($model->title))=>array('view','id'=>$model->id),
    'Update',
);
$this->menu=array(
    array('label'=>'List Forums', 'url'=>array('index')),
   	array('label'=>'Create Forum', 'url'=>array('create')),
   	array('label'=>'View Forum', 'url'=>array('view', 'id'=>$model->id)),
   	array('label'=>'Manage Forum', 'url'=>array('admin')),
);
$this->pageTitle = Yii::t('main','Update Forum');
?>
<header><h3><?php echo $this->pageTitle; ?></h3></header>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>