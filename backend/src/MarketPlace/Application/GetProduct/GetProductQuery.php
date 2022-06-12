<?php

namespace App\MarketPlace\Application\GetProduct;

use App\Event\Domain\Bus\Query\Query;

class GetProductQuery extends Query
{
    public function __construct(
        private string $code
    ) {
        parent::__construct();
    }

    public function code(): string
    {
        return $this->code;
    }
}
