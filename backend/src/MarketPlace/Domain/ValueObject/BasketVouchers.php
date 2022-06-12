<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\ValueObject;

use App\MarketPlace\Domain\Entity\Voucher;
use App\MarketPlace\Domain\Exception\VoucherIsAlreadyAddedException;
use App\Shared\Domain\Collection;

class BasketVouchers extends Collection
{
    public function addVoucher(Voucher $voucherToAdd): void
    {
        /** @var Voucher $voucher */
        foreach ($this->items() as $voucher) {
            if ($voucher->getCode() === $voucherToAdd->getCode()) {
                throw new VoucherIsAlreadyAddedException($voucherToAdd);
            }
        }

        $this->items[] = $voucherToAdd;
    }

    protected function type(): string
    {
        return BasketVouchers::class;
    }
}
