<?php
/* @var $this TopicController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bktopics',
);

$this->menu=array(
	array('label'=>'Create BKTopic', 'url'=>array('create')),
	array('label'=>'Manage BKTopic', 'url'=>array('admin')),
);
?>

<h1>Bktopics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
