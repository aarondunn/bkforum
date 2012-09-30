<?php
/* @var $this PostController */
/* @var $model BKPost */
/* @var $form CActiveForm */
/* @var $topic BKTopic */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bkpost-form',
	'enableAjaxValidation'=>false,
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'topic_id', array('value'=>$topic->id)); ?>
		<?php //echo $form->textField($model,'topic_id'); ?>
		<?php echo $form->error($model,'topic_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->