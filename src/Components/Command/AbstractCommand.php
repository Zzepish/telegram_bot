<?php

namespace App\Components\Command;

use App\Components\Entity\Update;
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

    public function isValid(Update $update): bool
    {
        $command = preg_split('#\s+|@#',$update->getMessage()->getText());

        return (trim(strtolower($command[0])) === '/' . strtolower($this->command));
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}