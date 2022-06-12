<?php

declare(strict_types=1);

namespace App\Event\Infrastructure\Messenger\Query;

use App\Event\Domain\Bus\Query\Query;
use App\Event\Domain\Bus\Query\QueryBus;
use App\Event\Domain\Bus\Query\QueryNotRegisteredError;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class SymfonyQueryBus implements QueryBus
{
    use HandleTrait {
        handle as handleQuery;
    }

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    public function ask(Query $query)//: ?Response
    {
        try {
            return $this->handleQuery($query);
        } catch (HandlerFailedException $e) {
            throw $e->getNestedExceptions()[0];
        } catch (NoHandlerForMessageException $e) {
            throw new QueryNotRegisteredError($query);
        }
    }
}
