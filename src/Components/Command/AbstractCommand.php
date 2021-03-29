<?php

namespace App\Components\Command;

use App\Components\Response;
use App\Telegram;

abstract class AbstractCommand implements CommandInterface
{
    protected string $name        = 'Command name';
    protected string $description = 'Command description';
    protected string $command     = 'command';

    protected Telegram $telegram;

    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    public function isValid(?Response $response): bool
    {

    }
}