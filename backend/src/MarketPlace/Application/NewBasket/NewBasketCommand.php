<?php

namespace App\MarketPlace\Application\NewBasket;

use App\Event\Domain\Bus\Command\Command;
use App\MarketPlace\Domain\Entity\Basket;

class NewBasketCommand extends Command
{
    public function __construct(
        private Basket $basket
    ) {
        parent::__construct();
    }

    public function basket(): Basket
    {
        return $this->basket;
    }
}
