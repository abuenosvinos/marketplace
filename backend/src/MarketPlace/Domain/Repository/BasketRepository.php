<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Repository;

use App\MarketPlace\Domain\Entity\Basket;

interface BasketRepository
{
    public function save(Basket $basket): void;

    public function remove(Basket $basket): void;

    public function findByIdentifier(string $identifier): Basket;
}
