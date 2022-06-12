<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Entity;

use App\Shared\Domain\Aggregate\AggregateRoot;

abstract class Voucher extends AggregateRoot
{
    protected string $code;
    protected int $order = 0;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    abstract public function getDiscount(Basket $basket, float $partialPrice): float;
}
