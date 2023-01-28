<?php

use SecurePass\App;

require_once __DIR__ . '/vendor/autoload.php';

if (php_sapi_name() !== 'cli') {
    exit();
}

$app = new App();

$app->registerCommand("hello", function (array $argv) use ($app) {
    $name = isset($argv[2]) ? $argv[2] : "World!";
    $app->getPrinter()->display("Hello $name!!!");
});

$app->registerCommand("generate", function (array $argv) use ($app) {
    $size = isset($argv[2]) ? $argv[2] : 8;
    $chars = isset($argv[3]) ? $argv[3] : "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";

    $strLength = strlen($chars);
    $password = "";

    for ($i = 0; $i < $size; $i++) {
        $random = mt_rand(0, $strLength - 1);
        $randomChar = substr($chars, $random, 1);
        $password .= $randomChar;
    }

    $app->getPrinter()->display($password);
});

$app->runCommand($argv);