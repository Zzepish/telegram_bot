<?php

namespace App\Components;

use App\Components\Entity\Chat;
use App\Components\Entity\Message;
use App\Components\Entity\User;

class Response
{
    protected bool $ok;
    protected string $error_message = '';
    protected array $raw_data = [];

    /**
     * @var Message[]
     */
    protected array $messages = [];

    public function __construct(array $data)
    {
        $this->raw_data = $data;
        $this->ok = $data['ok'];
        if($this->isOk()) {
            $this->processResponse($data['result']);
        } else {
            $this->error_message = $data['description'];
        }
    }

    public function isOk(): bool
    {
        return $this->ok;
    }

    /**
     * @return Message[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    private function processResponse(array $response_data): void
    {
        foreach($response_data as $message) {
            $user = new User($message['message']['from']);

            $chat = new Chat($message['message']['chat']);

            $message = new Message(
                $message['update_id'],
                $message['message']['date'],
                $message['message']['text'],
                $chat,
                $user
            );

            $this->messages[] = $message;
        }
    }

    public function getFirstMessage(): Message
    {
        return $this->messages[0];
    }
}