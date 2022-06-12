<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Repository;

use App\MarketPlace\Domain\Entity\Product;

interface ProductRepository
{
    public function findByCode(string $code): Product;
}
