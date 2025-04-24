<?php

namespace App\Handler;

use App\Entity\MessageLog;
use App\Message\SendNotificationMessage;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class SendNotificationHandler
{
    public function __construct(
        private LoggerInterface $logger,
        private EntityManagerInterface $entityManager
    )
    {}

    public function __invoke(SendNotificationMessage $message): void
    {
        $this->logger->info('Processing async message: ' . $message->getContent());

        //sleep(3);

        // Import message to DB
        $log = new MessageLog($message->getContent());
        $this->entityManager->persist($log);
        $this->entityManager->flush();

        $this->logger->info('Finished handling message.');
    }
}