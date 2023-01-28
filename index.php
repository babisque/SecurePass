<?php

use App\SecurePass\Commands\GenerateController;
use App\SecurePass\Commands\HelloController;
use SecurePass\App;

require_once __DIR__ . '/vendor/autoload.php';

if (php_sapi_name() !== 'cli') {
    exit();
}

$app = new App();

$app->registerController("hello", new HelloController($app));
$app->registerController("generate", new GenerateController($app));

$app->runCommand($argv);
