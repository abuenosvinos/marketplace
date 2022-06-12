<?php

declare(strict_types=1);

namespace App\MarketPlace\Infrastructure\Repository\Hardcore;

use App\MarketPlace\Domain\Entity\Voucher;
use App\MarketPlace\Domain\Exception\ThereIsNoVoucherException;
use App\MarketPlace\Domain\Repository\VoucherRepository;
use App\MarketPlace\Domain\Voucher\VoucherR;
use App\MarketPlace\Domain\Voucher\VoucherS;
use App\MarketPlace\Domain\Voucher\VoucherV;

class HardcoreVoucherRepository implements VoucherRepository
{
    public function findByCode(string $code): Voucher
    {
        $vouchers = $this->all();
        foreach ($vouchers as $voucherItem) {
            if ($voucherItem->getCode() == $code) {
                return $voucherItem;
            }
        }

        throw new ThereIsNoVoucherException($code);
    }

    private function all(): array
    {
        return [
            new VoucherR(),
            new VoucherV(),
            new VoucherS(),
        ];
    }
}
