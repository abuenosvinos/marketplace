<?php

namespace App\MarketPlace\Infrastructure\UI\Controller\Basket;

use App\Event\Domain\Bus\Query\QueryBus;
use App\MarketPlace\Application\GetBasket\GetBasketQuery;
use App\MarketPlace\Domain\Entity\Basket;
use App\MarketPlace\Domain\Entity\Voucher;
use App\MarketPlace\Domain\Exception\ThereIsNoBasketException;
use App\MarketPlace\Domain\ValueObject\BasketLine;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetController
{
    public function __construct(private QueryBus $queryBus)
    {
    }

    public function __invoke(string $identifier): JsonResponse
    {
        try {
            /** @var Basket $basket */
            $basket = $this->queryBus->ask(new GetBasketQuery($identifier));

            $response = [
                'identifier' => $basket->getIdentifier()->value(),
                'products' => [],
                'vouchers' => [],
                'price' => $basket->totalPrice(),
            ];

            /** @var BasketLine $basketLine */
            foreach ($basket->getBasketLines() as $basketLine) {
                $response['products'][] = [
                    'product' => $basketLine->getProduct()->getCode(),
                    'quantity' => $basketLine->getQuantity()
                ];
            }

            /** @var Voucher $voucher */
            foreach ($basket->getVouchers() as $voucher) {
                $response['vouchers'][] = [
                    'voucher' => $voucher->getCode()
                ];
            }

            return new JsonResponse($response);

        } catch (ThereIsNoBasketException $e) {
            return new JsonResponse(['message' => $e->getMessage()], 500);
        }
    }
}