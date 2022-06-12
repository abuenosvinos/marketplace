<?php

declare(strict_types=1);

namespace App\Tests\MarketPlace\Domain\Entity;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Entity\Product;
use App\MarketPlace\Domain\ValueObject\Price;
use App\MarketPlace\Domain\Voucher\VoucherR;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BasketTotalPriceWithVoucherRTest extends KernelTestCase
{
    public function testValidValuesPositive()
    {
        $productB = new Product('B', Price::create(10));
        $voucherR = new VoucherR();

        $basket = new Basket();
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addVoucher($voucherR);

        $this->assertEquals(15, $basket->totalPrice());
    }

    public function testValidValuesNegative()
    {
        $productB = new Product('B', Price::create(1));
        $voucherR = new VoucherR();

        $basket = new Basket();
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addVoucher($voucherR);

        $this->assertEquals(0, $basket->totalPrice());
    }
}
