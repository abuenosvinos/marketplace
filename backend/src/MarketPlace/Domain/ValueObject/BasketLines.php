<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\ValueObject;

use App\MarketPlace\Domain\Entity\Product;
use App\Shared\Domain\Collection;

class BasketLines extends Collection
{
    public function addProduct(Product $productToAdd): void
    {
        /** @var BasketLine $basketLine */
        foreach ($this->items() as $basketLine) {
            if ($basketLine->getCode() === $productToAdd->getCode()) {
                $basketLine->addQuantity(1);
                return;
            }

        }
        $this->items[] = new BasketLine($productToAdd);;
    }

    public function totalPrice(): float
    {
        $total = 0;

        /** @var BasketLine $item */
        foreach ($this->items() as $item) {
            $total += $item->totalPrice();
        }

        return $total;
    }

    protected function type(): string
    {
        return BasketLine::class;
    }
}
