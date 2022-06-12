<?php

declare(strict_types=1);

namespace App\Event\Infrastructure\Messenger\Event;

use App\Event\Domain\Bus\Event\Event;
use App\Event\Domain\Bus\Event\EventBus;
use App\Event\Domain\Bus\Event\EventNotRegisteredError;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DispatchAfterCurrentBusStamp;

class SymfonyEventBus implements EventBus
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $eventBus)
    {
        $this->bus = $eventBus;
    }

    public function notify(Event $event): void
    {
        try {
            $this->bus->dispatch((new Envelope($event))
                ->with(new DispatchAfterCurrentBusStamp()));
        } catch (HandlerFailedException $e) {
            throw $e->getNestedExceptions()[0];
        } catch (NoHandlerForMessageException) {
            throw new EventNotRegisteredError($event);
        }
    }
}
