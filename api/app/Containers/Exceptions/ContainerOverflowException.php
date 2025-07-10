<?php

namespace App\Containers\Exceptions;

use InvalidArgumentException;

class ContainerOverflowException extends InvalidArgumentException
{
    public function __construct(string $quantity, int $code = 422)
    {
        parent::__construct("Adding {$quantity} more will overflow the container.", $code);
    }
}
