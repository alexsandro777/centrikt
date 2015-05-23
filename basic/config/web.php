<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'language' => 'ru-RU',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Ql0TJDvzLynn-9dgXgVYGuEIjPQPWDc4',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
			'loginUrl'=>['user/security/login'],
        ],
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
		],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => 'smtp.yandex.ru',
				'username' => '79851461039@yandex.ru',
				'password' => 'toriponter',
				'port' => '25',
				'encryption' => 'tls',
			],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
		'authClientCollection' => [
			'class' => 'yii\authclient\Collection',
			'clients' => [
				'google' => [
					'class' => 'yii\authclient\clients\GoogleOpenId',
				],
				'vkontakte' => [
					'class' => 'yii\authclient\clients\VKontakte',
					'clientId' => '4859946',
					'clientSecret' => 'AhdWRXpcuUXAa3ZG1nkK',
				],
			],
		],
    ],
	'modules' => 
	[
		'user' => 
		[
			'class' => 'dektrium\user\Module',
			'mailer' => [
				'sender' => '79851461039@yandex.ru',
				'welcomeSubject' => 'Добро пожаловать на наш сайт!',
				'confirmationSubject' => 'Подтвердите!',
				'reconfirmationSubject' => 'Переподтверждение!',
				'recoverySubject' => 'Востановеление!',
			],
			'admins' => ['admin'],
		],
		'admin' => [
			'class' => 'mdm\admin\Module',
		]
	],
    'params' => $params,
	'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
			'user/security/*',
			'user/security/login',
			'user/registration/register',
			'user/registration/resend',
			'/user/registration/resend',
			'/user/security/login',
			'/user/security/logout',
			'/user/recovery/request',
			'/user/recovery/reset',
			'/user/settings/profile',
			'/user/settings/account',
			'/user/settings/networks',
			'/user/profile/show',// add or remove allowed actions to this list
        ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
