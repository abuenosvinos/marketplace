<?php

namespace App\MarketPlace\Application\NewBasket;

use App\Event\Domain\Bus\Command\CommandHandler;
use App\MarketPlace\Domain\Repository\BasketRepository;

class NewBasketCommandHandler implements CommandHandler
{
    public function __construct(private BasketRepository $basketRepository)
    {
    }

    public function __invoke(NewBasketCommand $command)
    {
        $this->basketRepository->save($command->basket());
    }
}
