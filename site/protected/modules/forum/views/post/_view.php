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
        <?php echo CHtml::encode($data->body); ?>
        <div class="comment-stuff">
            <?php echo CHtml::link('#','#post-'.$data->id)?>
            <?php echo Yii::t('main','Added')?>
            <?php echo Time::timeAgoInWords($data->time)?>
        </div>
    </div>

</div>