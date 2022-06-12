<?php

namespace App\MarketPlace\Infrastructure\UI\Controller\Basket;

use App\Event\Domain\Bus\Command\CommandBus;
use App\MarketPlace\Application\AddProduct\AddProductCommand;
use App\MarketPlace\Domain\Exception\ThereIsNoBasketException;
use App\MarketPlace\Domain\Exception\ThereIsNoProductException;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddProductController
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    public function __invoke(string $identifier, string $code): JsonResponse
    {
        try {
            $this->commandBus->dispatch(new AddProductCommand($identifier, $code));

            return new JsonResponse([
                'status' => 'ok'
            ]);

        } catch (ThereIsNoBasketException|ThereIsNoProductException $e) {
            return new JsonResponse(['message' => $e->getMessage()], 500);

        }
    }
}