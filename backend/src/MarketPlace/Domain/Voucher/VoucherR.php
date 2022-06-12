<?php

namespace App\MarketPlace\Domain\Voucher;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Entity\Voucher;
use App\MarketPlace\Domain\ValueObject\BasketLine;

class VoucherR extends Voucher
{
    private const CODE_PRODUCT = 'B';
    private const DISCOUNT_PRODUCT = 5;

    public function __construct()
    {
        $this->code = 'R';
    }

    public function getDiscount(Basket $basket, float $partialPrice): float
    {
        $discount = 0;
        $totalPriceProductB = 0;

        /** @var BasketLine $basketLine */
        foreach ($basket->getBasketLines()->items() as $basketLine) {
            if ($basketLine->getCode() === self::CODE_PRODUCT) {
                $discount += $basketLine->getQuantity() * self::DISCOUNT_PRODUCT;
                $totalPriceProductB = $basketLine->totalPrice();
                break;
            }
        }

        return min($discount, $totalPriceProductB);
    }
}
