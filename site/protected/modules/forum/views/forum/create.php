<?php
/* @var $this ForumController */
/* @var $model BKForum */
$this->breadcrumbs=array(
    Yii::app()->name=>array('/site'),
    'Forums'=>array('index'),
    'Create',
);
$this->menu=array(
	array('label'=>'List Forums', 'url'=>array('index')),
	array('label'=>'Manage Forum', 'url'=>array('admin')),
);
$this->pageTitle = Yii::t('main','Create Forum');
?>
<header><h3><?php echo $this->pageTitle; ?></h3></header>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>