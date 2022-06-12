<?php

declare(strict_types=1);

namespace App\Tests\MarketPlace\Domain\Entity;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Entity\Product;
use App\MarketPlace\Domain\ValueObject\Price;
use App\MarketPlace\Domain\Voucher\VoucherR;
use App\MarketPlace\Domain\Voucher\VoucherS;
use App\MarketPlace\Domain\Voucher\VoucherV;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BasketTotalPriceWithAllTest extends KernelTestCase
{
    public function testExample1()
    {
        list($productA, $productB, $productC) = $this->populateProducts();
        list($voucherR, $voucherS, $voucherV) = $this->populateVouchers();

        $basket = new Basket();
        $basket->addProduct($productA);
        $basket->addProduct($productC);
        $basket->addVoucher($voucherS);
        $basket->addProduct($productA);
        $basket->addVoucher($voucherV);
        $basket->addProduct($productB);

        $this->assertEquals(39, $basket->totalPrice());
    }

    public function testExample2()
    {
        list($productA, $productB, $productC) = $this->populateProducts();
        list($voucherR, $voucherS, $voucherV) = $this->populateVouchers();

        $basket = new Basket();
        $basket->addProduct($productA);
        $basket->addVoucher($voucherS);
        $basket->addProduct($productA);
        $basket->addVoucher($voucherV);
        $basket->addProduct($productB);
        $basket->addVoucher($voucherR);
        $basket->addProduct($productC);
        $basket->addProduct($productC);
        $basket->addProduct($productC);

        $this->assertEquals(55.1, $basket->totalPrice());
    }

    private function populateVouchers(): array
    {
       return [
           new VoucherR(),
           new VoucherS(),
           new VoucherV(),
       ];
    }

    private function populateProducts(): array
    {
        return [
            new Product('A', Price::create(10)),
            new Product('B', Price::create(8)),
            new Product('C', Price::create(12)),
        ];
    }
}
