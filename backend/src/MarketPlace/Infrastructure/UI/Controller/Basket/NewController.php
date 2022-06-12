<?php

namespace App\MarketPlace\Infrastructure\UI\Controller\Basket;

use App\Event\Domain\Bus\Command\CommandBus;
use App\MarketPlace\Application\NewBasket\NewBasketCommand;
use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Repository\BasketRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class NewController
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    public function __invoke(BasketRepository $basketRepository): JsonResponse
    {
        $basket = new Basket();
        $this->commandBus->dispatch(new NewBasketCommand($basket));

        return new JsonResponse([
            'identifier' => $basket->getIdentifier()->value()
        ]);
    }
}