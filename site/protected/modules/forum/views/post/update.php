<?php
/* @var $this PostController */
/* @var $model BKPost */

$this->breadcrumbs=array(
	'Bkposts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BKPost', 'url'=>array('index')),
	array('label'=>'Create BKPost', 'url'=>array('create')),
	array('label'=>'View BKPost', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BKPost', 'url'=>array('admin')),
);
?>

<h1>Update BKPost <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>