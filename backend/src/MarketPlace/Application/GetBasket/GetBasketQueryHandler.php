<?php

namespace App\MarketPlace\Application\GetBasket;

use App\Event\Domain\Bus\Query\QueryHandler;
use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Repository\BasketRepository;

class GetBasketQueryHandler implements QueryHandler
{
    public function __construct(private BasketRepository $basketRepository)
    {
    }

    public function __invoke(GetBasketQuery $query): Basket
    {
        return $this->basketRepository->findByIdentifier($query->identifier());
    }
}
