Installation
=====================

1) Copy forum module files
2) Define forum module settings in main config:
    'forum'=>array(
        'userModelClassName'=>'User',
        'userRolePropertyName'=>'forum_role',
    ),
3) Define public method repr() of the user model. This method should return user's name or username.

Next settings needed for roles:
4) Add 'forum_role' to both your User table ( varchar (50), default - 'user', index ) and User model
5) You can optionally change 'forum_role' field name by defining: 'userRolePropertyName'=>'forum_role'
6) Add this lines to components section of the main config:
    'user'=>array(
        'allowAutoLogin'=>true,
         'class' => 'BKWebUser',
    ),
    'authManager' => array(
        'class' => 'BKPhpAuthManager',
        'defaultRoles' => array('guest'),
    ),

7) Create auth.php config under /protected/config directory with these roles:

<?php
/**
 * Auth rules
 */
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => array(
            'guest',    //has all guest's rights
        ),
        'bizRule' => null,
        'data' => null
    ),
    'moderator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Moderator',
        'children' => array(
            'user',     //has all user's rights
        ),
        'bizRule' => null,
        'data' => null
    ),
    'admin' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'children' => array(
            'moderator',    //has all moderator's rights
        ),
        'bizRule' => null,
        'data' => null
    ),
);

8) If you are using re-defined CWebUser in user component, then please extend BKWebUser from your CWebUser

Notes
=======================

Available forum roles:
-----------------------

const FORUM_ROLE_ADMIN = 'admin';
const FORUM_ROLE_MODERATOR = 'moderator';
const FORUM_ROLE_USER = 'user';
const FORUM_ROLE_BANNED = 'banned';
