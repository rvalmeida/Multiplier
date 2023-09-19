<?php

namespace App\Exceptions;

use Exception;

class CNPJInvalidoException extends Exception
{
    public function __construct($message = "CNPJ inválido.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
