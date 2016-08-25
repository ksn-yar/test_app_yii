<?php

require '_shared.php';

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath' => Yii::getPathOfAlias('PROTECTED_APP'),
	'name' => 'test app console',
	
	// preloading 'log' component
	'preload' => array('log'),

	// application components
	'components'=> array(

		// database settings are configured in database.php
		'db' => $db,

		// логирование
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - error-console.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => true,
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'warning',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - warning-console.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => true,
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'info',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - info-console.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => YII_DEBUG,
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'trace',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - trace-console.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => YII_DEBUG,
				),
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'profile',
					'filter' => 'CLogFilter',
					'logFile' => $date . ' - profile-console.log',
					'LogPath' => Yii::getPathOfAlias('RUNTIME_LOG_PATH'),
					'enabled' => YII_DEBUG,
				),
			),
		),
	),
);
