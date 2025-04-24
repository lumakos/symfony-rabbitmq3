<?php

namespace App\Message;

readonly class SendNotificationMessage
{
    public function __construct(private string $text)
    {
    }

    public function getContent(): string
    {
        return $this->text;
    }
}