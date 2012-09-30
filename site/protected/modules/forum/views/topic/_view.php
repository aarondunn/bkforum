<?php
/* @var $this TopicController */
/* @var $model BKTopic */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode(Helper::truncateString($data->title)), array('topic/view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forum_id')); ?>:</b>
	<?php echo CHtml::encode($data->forum_id); ?>
	<br />


</div>