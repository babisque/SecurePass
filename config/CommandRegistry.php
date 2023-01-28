<?php

namespace SecurePass;

class CommandRegistry
{
    protected $registry = [];
    protected $controllers = [];

    public function registerController($commandName, CommandController $commandController): void
    {
        $this->controllers = [$commandName => $commandController];
    }

    public function register($name, $callable): void
    {
        $this->registry[$name] = $callable;
    }

    public function getController($command): mixed
    {
        return isset($this->controllers[$command]) ? $this->controllers[$command] : null;
    }

    public function getCommand($command): mixed
    {
        return isset($this->registry[$command]) ? $this->registry[$command] : null;
    }

    public function getCallable($commandName): mixed
    {
        $controller = $this->getController($commandName);
        if ($controller instanceof CommandController) {
            return [$controller, 'run'];
        }

        $command = $this->getCommand($commandName);
        if ($command === null) {
            throw new \Exception("Command \"$commandName\" not found.");
        }

        return $command;
    }
}