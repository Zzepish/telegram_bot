<?php

namespace App\Components\Entity;

class PollAnswer extends AbstractEntity
{
    private string $poll_id;
    private User   $user;
    private array  $option_ids;

    protected array $objects_to_fill = [
        'user' => User::class
    ];
}