<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Exception;

use App\MarketPlace\Domain\Entity\Voucher;

class VoucherIsAlreadyAddedException extends \DomainException
{
    public function __construct(Voucher $voucher)
    {
        parent::__construct(sprintf('The voucher (%s) is already in the basket', $voucher->getCode()));
    }
}
