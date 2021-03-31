<?php

namespace App\Components\Entity;

class PollAnswer extends AbstractImmutableEntity
{
    protected string $poll_id;
    protected User   $user;
    protected array  $option_ids;

    protected array $objects_to_fill = [
        'user' => User::class
    ];

    public function getPollId(): string
    {
        return $this->poll_id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getOptionIds(): array
    {
        return $this->option_ids;
    }
}