<?php

namespace App\MarketPlace\Application\GetVoucher;

use App\Event\Domain\Bus\Query\Query;

class GetVoucherQuery extends Query
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
