<?php

namespace App\Containers\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ContainerOverflowException extends HttpException
{
    public function __construct(string $quantity, int $code = 422)
    {
        parent::__construct($code,"Adding {$quantity} more will overflow the container.");
    }
}
