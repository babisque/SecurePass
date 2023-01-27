<?php

declare(strict_types=1);

use App\SecurePass\Commands\Hello;
use App\SecurePass\Commands\Password\GenerateCommand;

return [
    'ola' => Hello::class,
    'generate' => GenerateCommand::class,
];