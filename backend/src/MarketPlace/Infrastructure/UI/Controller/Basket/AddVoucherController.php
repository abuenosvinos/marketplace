<?php

namespace App\MarketPlace\Infrastructure\UI\Controller\Basket;

use App\Event\Domain\Bus\Command\CommandBus;
use App\MarketPlace\Application\AddVoucher\AddVoucherCommand;
use App\MarketPlace\Domain\Exception\ThereIsNoBasketException;
use App\MarketPlace\Domain\Exception\ThereIsNoVoucherException;
use App\MarketPlace\Domain\Exception\VoucherIsAlreadyAddedException;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddVoucherController
{
    public function __construct(private CommandBus $commandBus)
    {
    }

    public function __invoke(string $identifier, string $code): JsonResponse
    {
        try {
            $this->commandBus->dispatch(new AddVoucherCommand($identifier, $code));

            return new JsonResponse([
                'status' => 'ok'
            ]);

        } catch (ThereIsNoBasketException|ThereIsNoVoucherException|VoucherIsAlreadyAddedException $e) {
            return new JsonResponse(['message' => $e->getMessage()], 500);

        }
    }
}