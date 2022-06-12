<?php

declare(strict_types=1);

namespace App\Tests\MarketPlace\Domain\Entity;

use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Entity\Product;
use App\MarketPlace\Domain\ValueObject\Price;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BasketOnlyProductsTest extends KernelTestCase
{
    public function testValidValues1()
    {
        list($productA, $productB, $productC) = $this->populateProducts();

        $basket = new Basket();
        $basket->addProduct($productA);
        $basket->addProduct($productB);
        $basket->addProduct($productC);

        $this->assertEquals(60, $basket->totalPrice());
    }

    public function testValidValues2()
    {
        list($productA, $productB, $productC) = $this->populateProducts();

        $basket = new Basket();
        $basket->addProduct($productA);
        $basket->addProduct($productA);
        $basket->addProduct($productB);
        $basket->addProduct($productC);

        $this->assertEquals(70, $basket->totalPrice());
    }

    public function testValidValues3()
    {
        list($productA, $productB, $productC) = $this->populateProducts();

        $basket = new Basket();
        $basket->addProduct($productA);
        $basket->addProduct($productA);
        $basket->addProduct($productB);
        $basket->addProduct($productB);
        $basket->addProduct($productC);
        $basket->addProduct($productC);

        $this->assertEquals(120, $basket->totalPrice());
    }

    private function populateProducts(): array
    {
       return [
           new Product('A', Price::create(10)),
           new Product('B', Price::create(20)),
           new Product('C', Price::create(30)),
       ];
    }
}
