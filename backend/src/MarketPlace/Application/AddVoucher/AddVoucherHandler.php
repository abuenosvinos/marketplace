<?php

namespace App\MarketPlace\Application\AddVoucher;

use App\Event\Domain\Bus\Command\CommandHandler;
use App\Event\Domain\Bus\Event\EventBus;
use App\Event\Domain\Bus\Query\QueryBus;
use App\MarketPlace\Application\GetVoucher\GetVoucherQuery;
use App\MarketPlace\Domain\Event\VoucherAdded;
use App\MarketPlace\Domain\Repository\BasketRepository;

class AddVoucherHandler implements CommandHandler
{
    public function __construct(private BasketRepository $basketRepository, private QueryBus $queryBus, private EventBus $eventBus)
    {
    }

    public function __invoke(AddVoucherCommand $command)
    {
        $voucher = $this->queryBus->ask(new GetVoucherQuery($command->code()));
        $basket = $this->basketRepository->findByIdentifier($command->identifier());

        $basket->addVoucher($voucher);
        $this->basketRepository->save($basket);

        $this->eventBus->notify(new VoucherAdded($command->identifier(), $command->code()));
    }
}
