<?php

namespace App\MarketPlace\Application\GetBasket;

use App\Event\Domain\Bus\Query\Query;

class GetBasketQuery extends Query
{
    public function __construct(
        private string $identifier
    ) {
        parent::__construct();
    }

    public function identifier(): string
    {
        return $this->identifier;
    }
}
