<?php

namespace App\Message;

readonly class SendNotificationMessage
{
    public function __construct(private string $text)
    {
    }

    public function getText(): string
    {
        return $this->text;
    }
}