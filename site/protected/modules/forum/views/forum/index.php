<?php
/* @var $this ForumController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
    Yii::app()->name=>array('/site'),
    'Forums',//=>array('//forum'),
);
$this->menu=array(
	array('label'=>'Create Forum', 'url'=>array('create')),
	array('label'=>'Manage Forums', 'url'=>array('admin')),
);
?>
<header><h2><?php echo $this->pageTitle; ?></h2></header>

<h3><?php echo Yii::t('main','Forums:')?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
