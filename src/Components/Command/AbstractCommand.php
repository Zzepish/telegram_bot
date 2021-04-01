<?php

namespace Zzepish\Components\Command;

use Zzepish\Components\Entity\Update;
use Zzepish\Telegram;

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
        if(is_null($update->getMessage())) {
            return false;
        }
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