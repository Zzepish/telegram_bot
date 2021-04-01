<?php

namespace Zzepish\Components\Command;

use Zzepish\Components\Entity\Update;
use Zzepish\Components\Method\SendMessageMethod;
use Zzepish\Components\Response;
use Zzepish\Telegram;

class InfoCommand extends AbstractCommand
{
    protected string   $name        = 'Bot commands information';
    protected string   $description = 'Display information about commands available and there description';
    protected string   $command     = 'info';
    protected Telegram $telegram;

    public function execute(?Update $update = null)
    {
            $response_text = $this->name
                . PHP_EOL
                . str_repeat('=', 10)
                . PHP_EOL
                . $this->description
                . PHP_EOL
                . PHP_EOL
            ;

            foreach($this->telegram->getCommands() as $command) {
                $response_text .=
                    '/' . $command->getCommand()
                    . PHP_EOL
                    . $command->getName()
                    . PHP_EOL
                    . str_repeat('=', 10)
                    . PHP_EOL
                    . $command->getDescription()
                    . PHP_EOL
                    . PHP_EOL;

            }

            $response = $this->telegram->runMethod(
                SendMessageMethod::TELEGRAM_METHOD,
                [
                'chat_id'                     => $update->getMessage()->getChat()->getId(),
                'text'                        => $response_text,
                'reply_to_message_id'         => $update->getMessage()->getMessageId(),
                'allow_sending_without_reply' => true,
            ]);

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTelegram(): Telegram
    {
        return $this->telegram;
    }
}