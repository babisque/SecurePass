<?php

use App\SecurePass\Commands\Command;

require_once __DIR__ . '/vendor/autoload.php';
$commands = require_once __DIR__ . '/config/commands.php';

if (php_sapi_name() !== 'cli') {
    exit();
}

$key = $argv[1];

/** @var Command $command */
if (array_key_exists($key, $commands)) {
    $commandClass = $commands["$key"];
    $command = new $commandClass();
} else {
    echo "Comando inexistente";
    exit();
}

if (isset($argv[2])) {
    $command->exec($argv[2]);
} else {
    $command->exec();
}