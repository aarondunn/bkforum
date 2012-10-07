<?php

/**
 * BKUser
 *
 * @author Evgeniy `f0t0n` Naydenov <t.34.oxygen@gmail.com>
 * @author Alexey Kavshirko <kavshirko@gmail.com>
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
   	 * @return string the associated database table name
   	 */
   	public function tableName()
   	{
   		return self::model()->tableName();
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

    /**
   	 * @return array relational rules.
   	 */
   	public function relations()
   	{
        // NOTE: you may need to adjust the relation name and the related
   		// class name for the relations automatically generated below.
        return CMap::mergeArray(
            self::model()->relations(),
            array(
                'posts' => array(self::HAS_MANY, 'BKPost', 'user_id'),
                'postsCount'=>array(self::STAT, 'BKPost', 'user_id'),
            )
        );
   	}

    /**
     * @return string representation of User model
     */
    public function repr()
    {
        return $this->username;
/*        $stringRepresentation = '';
        if($this->id) {
            $stringRepresentation .= '[#' . $this->id . '] ';
        }
        return $stringRepresentation . $this->username
                . ' (' . $this->email . ')';*/
    }
}