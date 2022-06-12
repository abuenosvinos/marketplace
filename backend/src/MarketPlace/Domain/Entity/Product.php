<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Entity;

use App\MarketPlace\Domain\ValueObject\Price;
use App\Shared\Domain\Aggregate\AggregateRoot;

class Product extends AggregateRoot
{
    private string $code;
    private Price $price;

    public function __construct(string $code, Price $price)
    {
        $this->code = $code;
        $this->price = $price;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }

    public function setPrice(Price $price): void
    {
        $this->price = $price;
    }
}
