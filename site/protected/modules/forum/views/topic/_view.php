<?php
/* @var $this TopicController */
/* @var $model BKTopic */
?>

<dl class="topic">
  <dt>
      <?php echo CHtml::link(CHtml::encode($data->title), array('topic/view', 'id'=>$data->id)); ?>
      <span class="fr">
          <em class="pr_20"><?php echo Time::timeAgoInWords($data->time); ?></em>
          <em class="pr_20"><?php echo  ' by ' .  CHtml::encode($data->topicStarter->repr()); ?></em>
          <?php echo $data->postsCount; ?>
          <?php echo Yii::t('main', 'posts')?>
          <?php echo CHtml::ajaxLink(Yii::t('main','Hide'),
                   array('/forum/topic/hide', 'id'=>$data->id),
                   array(
                       'type'=>'post',
                       'success'=>'function(data,status){
                           $.fn.yiiListView.update("topic-list");
                       }',
                       'data'=>array(
                           'YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken,
                       ),
                   ),
                   array('confirm'=>'Are you sure?', 'id' => 'hide-link-'.uniqid()))?>
      </span>
  </dt>
  <dd><em><?php echo CHtml::encode($data->description); ?></em></dd>
</dl><?php //@to-do: add link?>