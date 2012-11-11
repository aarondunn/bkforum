<?php
/* @var $this PostController */
/* @var $model BKPost */
?>

<div class="comment" id="post-<?php echo $data->id ?>">
    <div class="comment-left">
        <p><?php echo CHtml::encode($data->user->repr()); ?></p>
        <p class="user-details"><?php echo Yii::t('main','Posts:'); ?> <?php echo $data->user->postsCount ?></p>
    </div>
    <div class="comment-right <?php if ($index%2==0) echo 'odd '; ?>">
        <?php echo $data->body; ?>
        <div class="comment-stuff">
            <?php echo CHtml::link('#','#post-'.$data->id)?>
            <?php echo Yii::t('main','Added')?>
            <?php echo Time::timeAgoInWords($data->time)?>
            <?php
                if(Yii::app()->user->checkAccess('moderator')){
                    echo CHtml::tag('span', array('class'=>'comment-actions'),false,false),
                         CHtml::link(Yii::t('main','Edit'),
                             array('/forum/post/update', 'id'=>$data->id),
                             array('class'=>'')),
                         CHtml::ajaxLink(Yii::t('main','Delete'),
                             array('/forum/post/delete', 'id'=>$data->id),
                             array(
                                 'type'=>'post',
                                 'success'=>'function(data,status){
                                     $.fn.yiiListView.update("post-list");
                                 }',
                                 'data'=>array(
                                     'YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken,
                                 ),
                             ),
                             array('confirm'=>'Are you sure?', 'id' => 'remove-link-'.uniqid())),
                         CHtml::closeTag('span');
                }
            ?>
        </div>
    </div>
</div>