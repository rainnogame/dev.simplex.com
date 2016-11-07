<?php
require('/var/www/html/app/helpers/DockerEnv.php');
\DockerEnv::init();
$config = \DockerEnv::webConfig();
(new yii\web\Application($config))->run();
