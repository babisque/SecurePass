<?php

namespace SecurePass;

class App
{
    protected $printer;
    protected $registry = [];

    public function __construct()
    {
        $this->printer = new CliPrinter();
    }

    public function getPrinter(): CliPrinter
    {
        return $this->printer;
    }

    public function registerCommand($name, $callable): void
    {
        $this->registry[$name] = $callable;
    }

    public function getCommand($command): mixed
    {
        return isset($this->registry[$command]) ? $this->registry[$command] : null;
    }

    /**
     * @param array $argv
     * @return void
     */
    public function runCommand($argv = []): void
    {
        $command_name = "help";

        if (isset($argv[1])) {
            $command_name = $argv[1];
        }

        $command = $this->getCommand($command_name);
        if ($command === null) {
            $this->getPrinter()->display("ERROR: Command \"$command_name\" not found.");
            exit;
        }

        call_user_func($command, $argv);
    }
}