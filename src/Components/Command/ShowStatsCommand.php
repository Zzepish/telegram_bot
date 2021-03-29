<?php

namespace App\Components\Command;

use App\Components\Response;
use App\Telegram;

class ShowStatsCommand extends AbstractCommand
{
    protected string $name        = 'Show stats';
    protected string $description = 'Show stats of government website';
    protected string $command     = 'showstats';
    protected Telegram $telegram;

    public function execute(?Response $response)
    {
        foreach($response->getMessages() as $message) {
            if(strpos($message->getText(), '/' . $this->command) === 0 ) {
                $response = $this->telegram->sendMessage(
                    [
                        'chat_id' => $message->getChat()->getId(),
                        'text'    => 'Test',
                        'reply_to_message_id' => $message->getId(),
                        'allow_sending_without_reply' => true,
                    ]
                );
                $r = 1;
            }
        }


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