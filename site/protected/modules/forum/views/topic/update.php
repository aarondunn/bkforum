<?php
/* @var $this TopicController */
/* @var $model BKTopic */

$this->breadcrumbs=array(
    Yii::app()->name=>array('/site'),
    'Forums'=>array('index'),
    CHtml::encode(BKHelper::truncateString($model->forum->title))=>array('view','id'=>$model->forum->id),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Topics', 'url'=>array('forum/view', 'id'=>$model->forum->id)),
	array('label'=>'Create Topic', 'url'=>array('create', 'forumID'=>$model->forum->id)),
	array('label'=>'View Topic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Topic', 'url'=>array('admin')),
);
$this->pageTitle = Yii::t('main','Update Topic');
?>
<header><h3><?php echo $this->pageTitle; ?></h3></header>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>