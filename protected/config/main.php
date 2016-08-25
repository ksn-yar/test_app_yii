<?php

require '_shared.php';

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => Yii::getPathOfAlias('PROTECTED_APP'),
	'name' => 'test app',
	'charset' => 'utf-8',
	'defaultController' => 'site',
	'sourceLanguage' => 'ru',
	'language' => 'ru',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.generated.*',
		'application.models.base.*',
		'application.models.ar.*',
		'application.models.forms.*',
		'application.models.*',
		'application.components.*',
	),

//	'modules'=>array(
//		'gii'=>array(
//			'class'=>'system.gii.GiiModule',
//			'password'=>'123',
//			'ipFilters'=>array('127.0.0.1','::10'),
//		),
//	),

	// application components
	'components' => array(
		// database settings are configured in database.php
		'db' => $db,

		'clientScript' => array(
			'scriptMap' => array(
				'mainJs' => '/js/main.js',
				'canvasDraw' => '/js/jquery.jqscribble.js',
			),
		),

		'session' => array(
			'sessionName' => 'app-test',
			'cookieMode' => 'only',
			'savePath' => Yii::getPathOfAlias('RUNTIME_SESSION_PATH'),
			'autoStart' => true
		),

		'securityManager'=>array(
			'encryptionKey' => '9519FAB0C0CE28A2',
		),

		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'caseSensitive' => false,
			'rules' => array(
//				'gii' => 'gii',
//				'gii/<controller:\w+>'=>'gii/<controller>',
//				'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
			),
		),

		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => YII_DEBUG ? null : 'site/error',
		),

		// логирование
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - error.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => true,
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'warning',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - warning.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => true,
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'info',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - info.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => YII_DEBUG,
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'trace',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - trace.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => YII_DEBUG,
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'profile',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - profile.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => YII_DEBUG,
				),
				// отображение на странице журнала приложения
				array(
					'class'=>'CWebLogRoute',
					'enabled' => YII_DEBUG,
				),
				// вывод профайлинга sql запросов в консоль firebug'a
				array(
					'enabled' => YII_DEBUG,
					'class' => 'CProfileLogRoute',
					'levels' => 'profile',
					'showInFireBug' => YII_DEBUG,
				),
			),
		),
	),
);

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
