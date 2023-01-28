<?php

namespace SecurePass;

abstract class CommandController
{
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    protected function getApp(): App
    {
        return $this->app;
    }

    abstract public function run($argv);
}