<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Exception;

class ThereIsNoProductException extends \DomainException
{
    public function __construct(string $code)
    {
        parent::__construct(sprintf('There is no product with the code %s', $code));
    }
}
