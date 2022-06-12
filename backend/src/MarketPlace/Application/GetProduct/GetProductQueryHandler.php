<?php

namespace App\MarketPlace\Application\GetProduct;

use App\Event\Domain\Bus\Query\QueryHandler;
use App\MarketPlace\Domain\Entity\Product;
use App\MarketPlace\Domain\Repository\ProductRepository;

class GetProductQueryHandler implements QueryHandler
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function __invoke(GetProductQuery $query): ?Product
    {
        return $this->productRepository->findByCode($query->code());
    }
}
