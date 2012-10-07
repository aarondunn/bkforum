<?php
/* @var $this ForumController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
    Yii::app()->name=>array('/site'),
    'Forums',//=>array('//forum'),
);
$this->menu=array(
	array('label'=>'Create Forum', 'url'=>array('create')),
	//array('label'=>'Manage Forums', 'url'=>array('admin')),
);
?>
<header><h2><?php echo $this->pageTitle; ?></h2></header>

<header class="nav nav-header"><?php echo Yii::t('main','List of Forums')?></header>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'summaryText'=>'',
    'emptyText'=>Yii::t('main','No forums yet.'),
    'pager'=>array(
        'header'=>'',
    )
)); ?>

<?php echo CHtml::link(Yii::t('main','New Forum'), '/forum/forum/create',
    array('class'=>'btn btn-primary btn-toolbar'))?>