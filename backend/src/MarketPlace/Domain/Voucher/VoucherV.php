<?php

namespace App\MarketPlace\Domain\Voucher;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Entity\Voucher;
use App\MarketPlace\Domain\ValueObject\BasketLine;

class VoucherV extends Voucher
{
    private const CODE_PRODUCT = 'A';
    private const PERCENT_DISCOUNT = 10;

    public function __construct()
    {
        $this->code = 'V';
    }

    public function getDiscount(Basket $basket, float $partialPrice): float
    {
        $discount = 0;

        /** @var BasketLine $basketLine */
        foreach ($basket->getBasketLines()->items() as $basketLine) {
            if ($basketLine->getCode() === self::CODE_PRODUCT) {
                if ($basketLine->getQuantity() > 1) {
                    $discount = (self::PERCENT_DISCOUNT / 100) * (($basketLine->getQuantity() - 1) * $basketLine->getProduct()->getPrice()->value());
                }

                break;
            }
        }

        return $discount;
    }
}