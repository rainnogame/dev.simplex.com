<?php
/* @var array() $web the web configuration */
$web = self::webConfig();
return [
    'id'                  => $web['id'],
    'basePath'            => $web['basePath'],
    'vendorPath'          => $web['vendorPath'],
    'bootstrap'           => ['log','gii'],
    'controllerNamespace' => 'app\commands',
    'components'          => [
        'db'  => $web['components']['db'],
        'log' => [
            'targets' => [
                [
                    'class'      => 'codemix\streamlog\Target',
                    'url'        => 'php://stdout',
                    'levels'     => ['info', 'trace'],
                    'categories' => ['app\\*'],
                    'logVars'    => [],
                ],
                [
                    'class'   => 'codemix\streamlog\Target',
                    'url'     => 'php://stderr',
                    'levels'  => ['error', 'warning'],
                    'logVars' => [],
                ],
            ],
        ],
    ],
    'modules'             => [
        'gii' => [
            'class'      => 'yii\gii\Module',
            'allowedIPs' => ['*'],
        ],
    ],
    'params'              => $web['params'],
];
