<?php

declare(strict_types=1);

namespace App\MarketPlace\Infrastructure\Repository\Hardcore;

use App\MarketPlace\Domain\Entity\Product;
use App\MarketPlace\Domain\Exception\ThereIsNoProductException;
use App\MarketPlace\Domain\Repository\ProductRepository;
use App\MarketPlace\Domain\ValueObject\Price;

class HardcoreProductRepository implements ProductRepository
{
    public function findByCode(string $code): Product
    {
        $products = $this->all();
        foreach ($products as $productItem) {
            if ($productItem->getCode() == $code) {
                return $productItem;
            }
        }

        throw new ThereIsNoProductException($code);
    }

    private function all(): array
    {
        return [
            new Product('A', Price::create(10)),
            new Product('B', Price::create(8)),
            new Product('C', Price::create(12)),
        ];
    }
}
