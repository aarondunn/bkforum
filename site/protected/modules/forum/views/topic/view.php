<?php
/* @var $this TopicController */
/* @var $model BKTopic */

$this->breadcrumbs=array(
    Yii::app()->name=>array('/site'),
    'Forums'=>array('index'),
    CHtml::encode(Helper::truncateString($model->forum->title))=>array('forum/view','id'=>$model->forum->id),
    CHtml::encode(Helper::truncateString($model->title))
);

$this->menu=array(
    array('label'=>'List Topics', 'url'=>array('forum/view', 'id'=>$model->forum->id)),
	array('label'=>'Create Topic', 'url'=>array('create', 'forumID'=>$model->forum->id)),
	array('label'=>'Update Topic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Topic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Topics', 'url'=>array('admin')),

    array('label'=>Yii::t('main','Posts'),'itemOptions'=>array('class'=>'nav-header')),
    array('label'=>'Create Post', 'url'=>array('post/create', 'topicID'=>$model->id)),
);
$this->pageTitle = CHtml::encode(Helper::truncateString($model->title));
?>
<header><h3><?php echo $this->pageTitle; ?></h3></header>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'forum_id',
	),
)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$posts,
    'itemView'=>'application.modules.forum.views.post._view',
)); ?>

