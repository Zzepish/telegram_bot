<?php

namespace App\Components;

use App\Components\Entity\Update;
use App\Components\Entity\User;

class Response
{
    protected bool   $ok;
    protected string $error_message = '';
    protected array  $raw_data      = [];

    /**
     * @var Update[]
     */
    protected array $updates = [];

    protected ?User $user = null;

    public function isOk(): bool
    {
        return $this->ok;
    }

    /**
     * @return Update[]
     */
    public function getUpdates(): array
    {
        return $this->updates;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public static function fromUpdates(array $data): self
    {
        $response           = new self;
        $response->raw_data = $data;
        $response->ok       = $data['ok'];
        if ($response->isOk()) {
            foreach ($data['result'] as $update) {
                $response->updates[] = new Update($update);
            }
        } else {
            $response->error_message = $data['description'];
        }

        return $response;
    }

    public static function fromGetMe(array $data)
    {
        $response           = new self;
        $response->raw_data = $data;
        $response->ok       = $data['ok'];
        if ($response->isOk()) {
            $response->user = new User($data['result']);
        } else {
            $response->error_message = $data['description'];
        }

        return $response;
    }
}