<?php

namespace App\Entity;

use App\Repository\MessageLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageLogRepository::class)]
class MessageLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private string $content;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $receivedAt;

    public function __construct(string $content)
    {
        $this->content = $content;
        $this->receivedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getReceivedAt(): \DateTimeInterface
    {
        return $this->receivedAt;
    }
}
