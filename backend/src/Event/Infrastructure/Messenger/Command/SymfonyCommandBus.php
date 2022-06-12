<?php

declare(strict_types=1);

namespace App\Event\Infrastructure\Messenger\Command;

use App\Event\Domain\Bus\Command\Command;
use App\Event\Domain\Bus\Command\CommandBus;
use App\Event\Domain\Bus\Command\CommandNotRegisteredError;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\MessageBusInterface;

class SymfonyCommandBus implements CommandBus
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->bus = $commandBus;
    }

    public function dispatch(Command $command): void
    {
        try {
            $this->bus->dispatch($command);
        } catch (HandlerFailedException $e) {
            throw $e->getNestedExceptions()[0];
        } catch (NoHandlerForMessageException) {
            throw new CommandNotRegisteredError($command);
        }
    }
}
