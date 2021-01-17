<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'components' => [
        'request' => [
            'baseUrl'=> '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'archiwood-secret-key-qq1111',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],

        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                        'js'=>[]
                    ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
           // 'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                //'<action:(.*)>' => 'user/<action>',
               // '<action:(.*)>' => 'user/<action>',
                'index'=>'site/index',
                'projects'=>'site/projects',
                'project-view/<id>'=>'site/project-view',
                'consulting'=>'site/consulting',
                'prices'=>'site/prices',
                'contact'=>'site/contact',
                'login'=>'site/login',
                'logout'=>'site/logout',
                'projects-list'=>'site/projects-list',
                'project-save'=>'site/project-save',
                'project-save/<id>'=>'site/project-save',
                //['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
                [
                    'class' => 'yii\rest\UrlRule', 
                    /*'patterns' => [
                        'GET,HEAD ' => 'view',
                        'POST' => 'create',
                        'GET,HEAD' => 'index',
                        'OPTIONS' => 'options',
                    ],*/
                    'controller' => [
                        'rest',
                    ],
                    //'pluralize' => false,
                    /*'extraPatterns' => [
                       'GET get1' => 'get1',
                       'POST post1'=>'post1',
                    ],*/
                ],
    

            ],

        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //     'class' => 'yii\debug\Module',
    //     // uncomment the following to add your IP if you are not connecting from localhost.
    //     //'allowedIPs' => ['127.0.0.1', '::1'],
    // ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
