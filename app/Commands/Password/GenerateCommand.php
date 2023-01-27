<?php

namespace App\SecurePass\Commands\Password;

use App\SecurePass\Commands\Command;

class GenerateCommand implements Command
{
	public function exec($size = 8, $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=")
    {
        $strLength = strlen($chars);
        $password = "";
        
        for ($i = 0; $i < $size; $i++) {
            $random = mt_rand(0, $strLength - 1);
            $randomChar = substr($chars, $random, 1);
            $password .= $randomChar;
        }

        echo $password;
	}
}