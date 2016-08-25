<?php
/**
 * Общие настройки для всего
 */

// пути
Yii::setPathOfAlias('ROOT_APP', dirname(dirname(dirname(__FILE__))));
Yii::setPathOfAlias('PROTECTED_APP', Yii::getPathOfAlias('ROOT_APP') . '/protected');
Yii::setPathOfAlias('WEB_DIR', Yii::getPathOfAlias('ROOT_APP') . '/public_html');

Yii::setPathOfAlias('RUNTIME_PATH', Yii::getPathOfAlias('PROTECTED_APP') . '/runtime');
Yii::setPathOfAlias('RUNTIME_LOG_PATH', Yii::getPathOfAlias('PROTECTED_APP') . '/runtime_logs');
Yii::setPathOfAlias('RUNTIME_SESSION_PATH', Yii::getPathOfAlias('PROTECTED_APP') . '/runtime_session');

Yii::setPathOfAlias('rel_data', '/data');
Yii::setPathOfAlias('abs_data', Yii::getPathOfAlias('WEB_DIR') . Yii::getPathOfAlias('rel_data'));

// админ. емаил по умолчанию
$admin_email = 'admin@example.com';

// подключение к БД
$db = [
	'connectionString' => 'mysql:host=localhost;dbname=app_test',
	'username' => 'root',
	'password' => 'ttt',
	'charset' => 'utf8',
	'autoConnect' => true,
	'emulatePrepare' => true,

//	'enableParamLogging' => true,
//	'enableProfiling' => true,
//	'schemaCachingDuration' => 3600,
];

$date = date('Y-m-d');