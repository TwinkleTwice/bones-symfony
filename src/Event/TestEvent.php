<?php

namespace App\Event;

/**
 * @psalm-immutable
 */
class TestEvent
{
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @psalm-api
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
