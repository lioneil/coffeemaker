<?php

namespace App\Containers\Exceptions;

class InsufficientResourceException extends \InvalidArgumentException
{
    public function __construct(string $quantity, string $remaining, string $message = 'Insufficient resource.', int $code = 422)
    {
        parent::__construct("{$message}. Need {$quantity} but only have {$remaining}.", $code);
    }
}
