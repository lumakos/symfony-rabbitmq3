<?php

namespace App\Handler;

use App\Message\SendNotificationMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class SendNotificationHandler implements MessageBusInterface
{
    public function __construct(private MessageBusInterface $bus)
    {
    }

    public function __invoke(SendNotificationMessage $message)
    {
        sleep(3);
    }

    public function dispatch(object $message, array $stamps = []): Envelope
    {

    }
}