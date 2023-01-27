<?php

declare(strict_types=1);

namespace App\SecurePass\Commands;

class Hello implements Command
{
	public function exec() 
    {
        echo "Hello world!";
	}
}