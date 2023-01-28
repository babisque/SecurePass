<?php

namespace SecurePass;

class App
{
    protected $printer;
    protected $commandRegistry;

    public function __construct()
    {
        $this->printer = new CliPrinter();
        $this->commandRegistry = new CommandRegistry();
    }

    public function getPrinter(): CliPrinter
    {
        return $this->printer;
    }

    public function registerController($name, CommandController $controller): void
    {
        $this->commandRegistry->registerController($name, $controller);
    }

    public function registerCommand($name, $callable): void
    {
        $this->commandRegistry->register($name, $callable);
    }

    /**
     * @param array $argv
     * @return void
     */
    public function runCommand($argv = [], $default_command = 'help')
    {
        $command_name = $default_command;

        if (isset($argv[1])) {
            $command_name = $argv[1];
        }

        try {
            call_user_func($this->commandRegistry->getCallable($command_name), $argv);
        } catch (\Exception $e) {
            $this->getPrinter()->display("ERROR: " . $e->getMessage());
            exit;
        }
    }
}