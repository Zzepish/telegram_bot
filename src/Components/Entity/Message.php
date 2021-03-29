<?php

namespace App\Components\Entity;

class Message
{
    private int    $id;
    private int    $date;
    private string $text;

    private Chat $chat;
    private User $user;

    public function __construct(
        int $id,
        int $date,
        string $text,
        Chat $chat,
        User $user
    ) {
        $this->id   = $id;
        $this->date = $date;
        $this->text = $text;
        $this->chat = $chat;
        $this->user = $user;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}