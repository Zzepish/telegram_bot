<?php

namespace App\Components\Entity;

class CallbackQuery extends AbstractImmutableEntity
{
    protected string   $id;
    protected User     $from;
    protected ?Message $message           = null;
    protected ?string  $inline_message_id = null;
    protected string   $chat_instance;
    protected ?string  $data              = null;
    protected ?string  $game_short_name   = null;

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