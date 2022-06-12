<?php

namespace App\MarketPlace\Application\AddProduct;

use App\Event\Domain\Bus\Command\CommandHandler;
use App\Event\Domain\Bus\Event\EventBus;
use App\Event\Domain\Bus\Query\QueryBus;
use App\MarketPlace\Application\GetProduct\GetProductQuery;
use App\MarketPlace\Domain\Event\ProductAdded;
use App\MarketPlace\Domain\Repository\BasketRepository;

class AddProductHandler implements CommandHandler
{
    public function __construct(private BasketRepository $basketRepository, private QueryBus $queryBus, private EventBus $eventBus)
    {
    }

    public function __invoke(AddProductCommand $command)
    {
        $product = $this->queryBus->ask(new GetProductQuery($command->code()));
        $basket = $this->basketRepository->findByIdentifier($command->identifier());

        $basket->addProduct($product);
        $this->basketRepository->save($basket);

        $this->eventBus->notify(new ProductAdded($command->identifier(), $command->code()));
    }
}
