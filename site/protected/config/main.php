<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return CMap::mergeArray(
    array(
    	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    	'name'=>'MyWebApp',

    	// preloading 'log' component
    	'preload'=>array('log'),

    	// autoloading model and component classes
    	'import'=>array(
    		'application.models.*',
    		'application.components.*',
            'application.modules.forum.components.*',
            'application.modules.forum.extensions.*',
        ),

    	'modules'=>array(
    		'gii'=>array(
    			'class'=>'system.gii.GiiModule',
    			'password'=>'123',
    			// If removed, Gii defaults to localhost only. Edit carefully to taste.
    			'ipFilters'=>array(
                    '127.0.0.1',
                    '::1',
                    '192.168.1.*'
                ),
    		),
            'forum'=>array(
                'userModelClassName'=>'User',
                'userRolePropertyName'=>'forum_role', // User model property that defines user role on forum
            ),
    	),

    	// application components
    	'components'=>array(
    		'user'=>array(
    			// enable cookie-based authentication
    			'allowAutoLogin'=>true,
                'class' => 'BKWebUser',
    		),
    		// uncomment the following to enable URLs in path-format

    		'urlManager'=>array(
    			'urlFormat'=>'path',
    			'showScriptName' => false,
    			'rules'=>array(
    				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
    				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    			),
    		),

    		/*'db'=>array(
    			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
    		),*/
    		// uncomment the following to use a MySQL database

    		'db'=>array(
    			'connectionString' => 'mysql:host=localhost;dbname=bkforum',
                'emulatePrepare' => true,
                'username' => 'sp1222',
                'password' => '2221ps',
                'charset' => 'utf8',
                'tablePrefix' => 'bkf_',
    		),

    		'errorHandler'=>array(
    			// use 'site/error' action to display errors
    			'errorAction'=>'site/error',
    		),
    		'log'=>array(
    			'class'=>'CLogRouter',
    			'routes'=>array(
    				array(
    					'class'=>'CFileLogRoute',
    					'levels'=>'error, warning',
    				),
    				// uncomment the following to show log messages on web pages
    				/*
    				array(
    					'class'=>'CWebLogRoute',
    				),
    				*/
    			),
    		),

            'authManager' => array(
                'class' => 'BKPhpAuthManager',
                'defaultRoles' => array('guest'),
            ),
    	),

    	// application-level parameters that can be accessed
    	// using Yii::app()->params['paramName']
    	'params'=>array(
    		// this is used in contact page
    		'adminEmail'=>'webmaster@example.com',
    	),
    ),
	require(dirname(__FILE__).'/main.custom.php')
);
