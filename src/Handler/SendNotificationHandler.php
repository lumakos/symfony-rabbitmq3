<?php

namespace App\Handler;

use App\Message\SendNotificationMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class SendNotificationHandler
{
    public function __construct(private MessageBusInterface $bus)
    {
    }

    public function __invoke(SendNotificationMessage $message): void
    {
        //sleep(3);
        echo "Handled message: " . $message->getText();
    }
}