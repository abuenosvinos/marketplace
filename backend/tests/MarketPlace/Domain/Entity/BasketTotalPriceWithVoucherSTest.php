<?php

declare(strict_types=1);

namespace App\Tests\MarketPlace\Domain\Entity;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Entity\Product;
use App\MarketPlace\Domain\ValueObject\Price;
use App\MarketPlace\Domain\Voucher\VoucherS;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BasketTotalPriceWithVoucherSTest extends KernelTestCase
{
    public function testValidValuesWithoutDiscount()
    {
        $productB = new Product('B', Price::create(25));
        $voucherS = new VoucherS();

        $basket = new Basket();
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addVoucher($voucherS);

        $this->assertEquals(95, $basket->totalPrice());
    }

    public function testValidValuesWithDiscount()
    {
        $productB = new Product('B', Price::create(5));
        $voucherS = new VoucherS();

        $basket = new Basket();
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addVoucher($voucherS);

        $this->assertEquals(15, $basket->totalPrice());
    }
}
