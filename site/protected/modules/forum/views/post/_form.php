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
    'action'=>'/forum/post/create/topicID/'.$topic->id
)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
        <?php $this->widget('forum.extensions.redactorjs.Redactor',
            array( 'model' => $model, 'attribute' => 'body' ,
                'htmlOptions'=>array('style'=>'height:100px; font-size:10px; font-weight: normal'),
                'editorOptions' => array('autoresize' => true, 'fixed' => true),
            ));?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'topic_id', array('value'=>$topic->id)); ?>
		<?php //echo $form->textField($model,'topic_id'); ?>
		<?php echo $form->error($model,'topic_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
        <?php echo CHtml::button('Cancel', array('class'=>'btn','onclick'=>'history.go(-1)')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->