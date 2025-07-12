<?php

namespace App\Containers\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class InsufficientResourceException extends HttpException
{
    public function __construct(string $quantity, string $remaining, string $message = 'Insufficient resource.', int $code = 507)
    {
        parent::__construct($code, "{$message}. Need {$quantity} but only have {$remaining}.");
    }
}
