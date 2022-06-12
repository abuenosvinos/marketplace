<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Repository;

use App\MarketPlace\Domain\Entity\Voucher;

interface VoucherRepository
{
    public function findByCode(string $code): Voucher;
}
