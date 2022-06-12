<?php

namespace App\MarketPlace\Domain\Event;

use App\Event\Domain\Bus\Event\Event;

class ProductAdded extends Event
{
    public function __construct(private string $basketIdentifier, private string $codeProduct)
    {
        parent::__construct();
    }
}