<?php

namespace App\Components\Command;

use App\Components\Entity\Update;
use App\Components\Response;
use App\Telegram;

class ShowStatsCommand extends AbstractCommand
{
    protected string   $name        = 'Show stats';
    protected string   $description = 'Show stats of government website';
    protected string   $command     = 'showstats';
    protected Telegram $telegram;

    public function execute(?Update $update = null)
    {
        $response = $this->telegram->sendMessage([
            'chat_id'                     => $update->getMessage()->getChat()->getId(),
            'text'                        => 'Test',
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