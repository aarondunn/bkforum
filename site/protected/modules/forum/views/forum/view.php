<?php
/* @var $this ForumController */
/* @var $model BKForum */
$this->breadcrumbs=array(
    Yii::app()->name=>array('/site'),
    'Forums'=>array('index'),
    CHtml::encode(BKHelper::truncateString($model->title)),
);
$this->menu=array(
    array('label'=>'List Forums', 'url'=>array('index')),
   	//array('label'=>'Create Forum', 'url'=>array('create')),
   	//array('label'=>'Update Forum', 'url'=>array('update', 'id'=>$model->id)),
   	//array('label'=>'Delete Forum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
   	//array('label'=>'Manage Forums', 'url'=>array('admin')),

    array('label'=>Yii::t('main','Topics'),'itemOptions'=>array('class'=>'nav-header')),
    array('label'=>'Create Topic', 'url'=>array('topic/create', 'forumID'=>$model->id)),
);
$this->pageTitle = CHtml::encode(BKHelper::truncateString($model->title));
?>
<header><h3><?php echo $this->pageTitle; ?></h3></header>

<header><em><?php echo CHtml::encode($model->description) ?></em></header>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$topics,
	'itemView'=>'application.modules.forum.views.topic._view',
    'summaryText'=>'',
    'emptyText'=>Yii::t('main','No topics yet.'),
    'pager'=>array(
        'header'=>'',
    )
)); ?>

<?php echo CHtml::link(Yii::t('main','New Topic'), array('/forum/topic/create', 'forumID'=>$model->id),
    array('class'=>'btn btn-primary btn-toolbar'))?>
