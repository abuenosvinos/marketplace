<?php

namespace App\MarketPlace\Domain\Event;

use App\Event\Domain\Bus\Event\Event;

class VoucherAdded extends Event
{
    public function __construct(private string $basketIdentifier, private string $codeVoucher)
    {
        parent::__construct();
    }
}