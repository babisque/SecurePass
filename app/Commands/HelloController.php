<?php

namespace App\SecurePass\Commands;

use SecurePass\CommandController;

class HelloController extends CommandController
{
    public function run($argv): void
    {
        $name = isset($argv[2]) ? $argv[2] : "World!";
        $this->getApp()->getPrinter()->display("Hello $name!!!");
    }
}