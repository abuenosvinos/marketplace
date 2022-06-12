<?php

namespace App\MarketPlace\Application\VoucherAdded;

use App\Event\Domain\Bus\Event\EventHandler;
use App\MarketPlace\Domain\Event\VoucherAdded;

class VoucherAddedHandler implements EventHandler
{
    public function __invoke(VoucherAdded $event): void
    {
        // We do whatever is necessary
    }
}