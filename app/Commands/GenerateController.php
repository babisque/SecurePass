<?php

namespace App\SecurePass\Commands;

use SecurePass\CommandController;

class GenerateController extends CommandController
{
    public function run($argv)
    {
        $size = isset($argv[2]) ? $argv[2] : 8;
        $chars = isset($argv[3]) ? $argv[3] : "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";

        $strLength = strlen($chars);
        $password = "";

        for ($i = 0; $i < $size; $i++) {
            $random = mt_rand(0, $strLength - 1);
            $randomChar = substr($chars, $random, 1);
            $password .= $randomChar;
        }

        $this->getApp()->getPrinter()->display($password);
    }
}