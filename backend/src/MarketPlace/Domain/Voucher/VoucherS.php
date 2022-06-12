<?php

namespace App\MarketPlace\Domain\Voucher;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Entity\Voucher;

class VoucherS extends Voucher
{
    private const MIN_PRICE_BASKET_TO_APPLY_DISCOUNT = 40;
    private const PERCENT_DISCOUNT = 5;

    public function __construct()
    {
        $this->code = 'S';
        $this->order = 10;
    }

    public function getDiscount(Basket $basket, float $partialPrice): float
    {
        $discount = 0;

        if ($partialPrice > self::MIN_PRICE_BASKET_TO_APPLY_DISCOUNT) {
            $discount = (self::PERCENT_DISCOUNT / 100) * $partialPrice;
        }

        return $discount;
    }
}