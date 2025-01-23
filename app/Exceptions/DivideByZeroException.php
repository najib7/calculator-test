<?php

namespace App\Exceptions;

use Exception;

class DivideByZeroException extends Exception
{
    public function __construct()
    {
        parent::__construct('Division by zero in not allowed!!');
    }
}
