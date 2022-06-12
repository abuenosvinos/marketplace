<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\ValueObject;

use App\MarketPlace\Domain\Entity\Product;

class BasketLine
{
    private string $code;
    private Product $product;
    private int $quantity;

    public function __construct(Product $product)
    {
        $this->code = $product->getCode();
        $this->product = $product;
        $this->quantity = 1;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function addQuantity(int $quantity): void
    {
        $this->quantity += $quantity;
    }

    public function totalPrice(): float
    {
        return $this->quantity * $this->product->getPrice()->value();
    }
}
