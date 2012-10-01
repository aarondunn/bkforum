<?php

/**
 * BKUser
 *
 * @author Evgeniy `f0t0n` Naydenov <t.34.oxygen@gmail.com>
 */
class BKUser extends ForumActiveRecord {

    protected static $_current_user = null;

    public static function model($className = null) {
        if(empty($className)) {
            $className = Yii::app()->getModule('forum')->userModelClassName;
        }
        return parent::model($className);
    }

    public static function create($attributes=array()) {
        return self::model()->populateRecord($attributes);
    }

    /**
     * Returns current logged-in user's model or null if the user is guest.
     * @return User
     */
    public static function current()
    {
		if(empty(Yii::app()->user) || Yii::app()->user->isGuest) {
			return null;
		}
		if(empty(self::$_current_user)) {
			self::$_current_user = self::model()->findByPk(Yii::app()->user->id);
		}
		return self::$_current_user;
    }
}