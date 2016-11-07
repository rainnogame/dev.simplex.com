<?php
$config = [
    'id'          => 'basic',
    'basePath'    => '/var/www/html/app',
    'runtimePath' => '/var/www/html/runtime',
    'vendorPath'  => '/var/www/vendor',
    'modules'     => [
        'markdown' => [
            'class' => 'kartik\markdown\Module',
        ],
    ],
    'components'  => [
        'cache'        => [
            'class' => 'yii\caching\DummyCache',
//            'useMemcached' => TRUE,
//            'servers'      => [
//                [
//                    'host' => '192.168.99.100',
//                    'port' => 11211,
//                ],
//            ],
        ],
        'assetManager' => [
            'class'      => 'yii\web\AssetManager',
            'forceCopy'  => TRUE,
//            'linkAssets' => TRUE,
        ],
        'db'           => [
            'class'       => 'yii\db\Connection',
            'dsn'         => \DockerEnv::dbDsn(),
            'username'    => \DockerEnv::dbUser(),
            'password'    => \DockerEnv::dbPassword(),
            'charset'     => 'utf8',
            'tablePrefix' => 'simp_',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail'         => [
            'class'     => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class'    => 'Swift_SmtpTransport',
                'host'     => \DockerEnv::get('SMTP_HOST'),
                'username' => \DockerEnv::get('SMTP_USER'),
                'password' => \DockerEnv::get('SMTP_PASSWORD'),
            ],
        ],
        'log'          => [
            'traceLevel' => \DockerEnv::get('YII_TRACELEVEL', 0),
            'targets'    => [
                [
                    'class'   => 'codemix\streamlog\Target',
                    'url'     => 'php://stdout',
                    'levels'  => ['info', 'trace'],
                    'logVars' => [],
                ],
                [
                    'class'   => 'codemix\streamlog\Target',
                    'url'     => 'php://stderr',
                    'levels'  => ['error', 'warning'],
                    'logVars' => [],
                ],
            ],
        ],
        'request'      => [
            'cookieValidationKey' => \DockerEnv::get('COOKIE_VALIDATION_KEY', NULL, !YII_ENV_TEST),
        ],
        'urlManager'   => [
            'enablePrettyUrl' => TRUE,
            'showScriptName'  => FALSE,
        ],
        'user'         => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => TRUE,
        ],
        
        'articlesManager' => [
            'class' => '\app\managers\ArticlesManager',
        ],
    ],
    'params'      => require('/var/www/html/config/params.php'),
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class'      => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
