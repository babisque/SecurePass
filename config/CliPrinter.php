<?php

namespace SecurePass;

class CliPrinter
{
    private function out($message): void
    {
        echo $message;
    }

    private function newLine(): void
    {
        $this->out("\n");
    }

    public function display($message): void
    {
        $this->newLine();
        $this->out($message);
        $this->newLine();
        $this->newLine();
    }
}