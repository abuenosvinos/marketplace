<?php

namespace App\MarketPlace\Application\ProductAdded;

use App\Event\Domain\Bus\Event\EventHandler;
use App\MarketPlace\Domain\Event\ProductAdded;

class ProductAddedHandler implements EventHandler
{
    public function __invoke(ProductAdded $event): void
    {
        // We do whatever is necessary
    }
}