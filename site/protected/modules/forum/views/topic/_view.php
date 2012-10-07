<?php
/* @var $this TopicController */
/* @var $model BKTopic */
?>

<dl class="topic">
  <dt>
      <?php echo CHtml::link(CHtml::encode($data->title), array('topic/view', 'id'=>$data->id)); ?>
      <span class="fr">
          <?php echo $data->postsCount; ?>
          <?php echo Yii::t('main', 'posts')?>
      </span>
  </dt>
  <dd><em><?php echo CHtml::encode($data->description); ?></em></dd>
</dl>