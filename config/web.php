<?php

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';

$config = [
	'id'         => 'basic',
	'basePath'   => dirname( __DIR__ ),
	'bootstrap'  => [ 'log' ],
	'language'   => 'ru',
	'aliases'    => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'components' => [
		'request'      => [
			'enableCsrfValidation' => false,
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey'  => 'NtC8TLEAnI8DYwWjrjdaauocn_HQfZ-p',
			'baseUrl'              => '',
		],
		'cache'        => [
			'class' => 'yii\caching\FileCache',
		],
		'user'         => [
			'identityClass'   => 'app\models\User',
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'mailer'       => [
			'class'            => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => true,
		],
		'log'          => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets'    => [
				[
					'class'  => 'yii\log\FileTarget',
					'levels' => [ 'error', 'warning' ],
				],
			],
		],
		'db'           => $db,
		'urlManager'   => [
			'suffix'          => '/',
			'enablePrettyUrl' => true,
			'showScriptName'  => false,
			'rules'           => [
				'form/save'          => 'form/save',
				'aktsii/page/<page>' => 'site/stock',
				'aktsii/<alias>'     => 'site/stock',
				'aktsii'             => 'site/stock',

				'novosti/page/<page>' => 'site/news',
				'novosti/<alias>'     => 'site/news',
				'novosti'             => 'site/news',

				'portfolio' => 'site/portfolio',

				'stroitelnue-rabotu'                     => 'site/construction-work',
				'stroitelnue-rabotu/<alias>'             => 'site/construction-work-item',
				'stroitelnue-rabotu/<alias_1>/<alias_2>' => 'site/construction-work-item-two',

				'stroitelstvo-pod-zakaz'                             => 'site/construction-to-order',
				'stroitelstvo-pod-zakaz/gotovue-proektu'             => 'site/ready-projects',
				'stroitelstvo-pod-zakaz/gotovue-proektu/page/<page>' => 'site/ready-projects',
				'stroitelstvo-pod-zakaz/gotovue-proektu/<alias>'     => 'site/ready-projects-item',

				'o-nas'             => 'site/about',
				'contacts'          => 'site/contacts',
				'design'            => 'site/design',
				'landshaft-i-dekor' => 'site/landscape',

				'individual-designing-of-objects' => 'site/individual-designing-of-objects',
				'zakazat-postroyku-obyektov'      => 'site/order-the-construction-of-objects',

				'/' => 'site/index',
			],
		],
	],
	'params'     => $params,
];

if ( YII_ENV_DEV ) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][]      = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];

	$config['bootstrap'][]    = 'gii';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		// uncomment the following to add your IP if you are not connecting from localhost.
		//'allowedIPs' => ['127.0.0.1', '::1'],
	];
}

return $config;
