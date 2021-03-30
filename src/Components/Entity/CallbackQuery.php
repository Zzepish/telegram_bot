<?php

namespace App\Components\Entity;

class CallbackQuery extends AbstractEntity
{
    private string   $id;
    private User     $from;
    private ?Message $message           = null;
    private ?string  $inline_message_id = null;
    private string   $chat_instance;
    private ?string  $data              = null;
    private ?string  $game_short_name   = null;

    protected array $objects_to_fill = [
        'from'    => User::class,
        'message' => Message::class
    ];

    public function getId(): string
    {
        return $this->id;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    public function getChatInstance(): string
    {
        return $this->chat_instance;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function getGameShortName(): ?string
    {
        return $this->game_short_name;
    }
}