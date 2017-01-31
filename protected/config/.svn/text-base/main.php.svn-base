<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Let\'s Hangout',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','192.168.0.201'),
		),
		*/
	),

	// application components
	'components'=>array(
		'user'=>array(
			// this is actually the default value
                        'loginUrl'=>array('user/login'),
                        // enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			//'caseSensitive'=>false, 
			'rules'=>array(
				''=>'home/index',
				'events' => 'events',
				'movies' => 'movies',
				'<view:\w+>' => 'home/page',
				/*'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',*/
			),
		),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'home/error',
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
                'clientScript' => array(  
                        'class' => 'ext.EClientScript.EClientScript',  
                        'combineScriptFiles' => true,  
                        'combineCssFiles' => false,  
                        'optimizeCssFiles' => false,  
                        'optimizeScriptFiles' => false,  
                ),
                // enables theme based JQueryUI's
                'widgetFactory' => array(
                    'widgets' => array(
                        'CJuiAutoComplete' => array(
                            'themeUrl' => '/themes/juiautcomplete/',
                            'cssFile' => 'jquery-ui.theme.min.css',
                        ),
                    ),
                ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                'apiUrl'=>'http://api.letshangout.com/',
                'late'=>'I\'ll be late',
                'departed'=>'I\'m on my way',
                'cancel'=>'I\'m dropping',
                'arrived'=>'I\'m arrived',
	),
);