<?php

/**
 * BKUser
 *
 * @author Evgeniy `f0t0n` Naydenov <t.34.oxygen@gmail.com>
 */
class BKUser extends ForumActiveRecord {

    public static function model($className = null) {
        if(empty($className)) {
            $className = Yii::app()->getModule('forum')->userModelClassName;
        }
        return parent::model($className);
    }

    public static function create($attributes=array()) {
        return self::model()->populateRecord($attributes);
    }
}