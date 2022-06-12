<?php

declare(strict_types=1);

namespace App\MarketPlace\Domain\Entity;

use App\MarketPlace\Domain\ValueObject\BasketLines;
use App\MarketPlace\Domain\ValueObject\BasketVouchers;
use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\ValueObject\Uuid;

class Basket extends AggregateRoot
{
    private Uuid $identifier;
    private BasketLines $basketLines;
    private BasketVouchers $vouchers;

    public function __construct()
    {
        $this->identifier = Uuid::random();
        $this->basketLines = new BasketLines();
        $this->vouchers = new BasketVouchers();
    }

    public function addProduct(Product $product): void
    {
        $this->basketLines->addProduct($product);
    }

    public function addVoucher(Voucher $voucher): void
    {
        $this->vouchers->addVoucher($voucher);
    }

    public function getIdentifier(): Uuid
    {
        return $this->identifier;
    }

    public function getBasketLines(): BasketLines
    {
        return $this->basketLines;
    }

    public function getVouchers(): BasketVouchers
    {
        return $this->vouchers;
    }

    public function totalPrice(): float
    {
        $vouchers = $this->vouchers->items();
        usort($vouchers, function ($a, $b) {
            return $a->getOrder() - $b->getOrder();
        });

        $partialPrice = $this->basketLines->totalPrice();

        /** @var Voucher $voucher */
        foreach ($vouchers as $voucher) {
            $discount = $voucher->getDiscount($this, $partialPrice);
            $partialPrice = $partialPrice - $discount;
        }

        return $partialPrice;
    }
}
