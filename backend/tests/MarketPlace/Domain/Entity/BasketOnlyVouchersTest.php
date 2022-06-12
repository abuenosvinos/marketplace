<?php

declare(strict_types=1);

namespace App\Tests\MarketPlace\Domain\Entity;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Exception\VoucherIsAlreadyAddedException;
use App\MarketPlace\Domain\Voucher\VoucherR;
use App\MarketPlace\Domain\Voucher\VoucherS;
use App\MarketPlace\Domain\Voucher\VoucherV;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BasketOnlyVouchersTest extends KernelTestCase
{
    public function testValidValues()
    {
        list($voucherR, $voucherS, $voucherV) = $this->populateVouchers();

        $basket = new Basket();
        $basket->addVoucher($voucherR);
        $basket->addVoucher($voucherS);
        $basket->addVoucher($voucherV);

        $this->assertEquals(0, $basket->totalPrice());
    }

    public function testNotValidValues()
    {
        $this->expectException(VoucherIsAlreadyAddedException::class);

        list($voucherR, $voucherS, $voucherV) = $this->populateVouchers();

        $basket = new Basket();
        $basket->addVoucher($voucherR);
        $basket->addVoucher($voucherS);
        $basket->addVoucher($voucherV);
        $basket->addVoucher($voucherR);
    }

    private function populateVouchers(): array
    {
       return [
           new VoucherR(),
           new VoucherS(),
           new VoucherV(),
       ];
    }
}
