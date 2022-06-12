<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Exception;

class ThereIsNoBasketException extends \DomainException
{
    public function __construct(string $identifier)
    {
        parent::__construct(sprintf('There is no basket with the identifier %s', $identifier));
    }
}
