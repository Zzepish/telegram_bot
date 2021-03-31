<?php

namespace App\Components\Entity;

class ChosenInlineResult extends AbstractImmutableEntity
{
    protected string    $result_id;
    protected User      $from;
    protected ?Location $location          = null;
    protected ?string   $inline_message_id = null;
    protected string    $query;

    protected array $objects_to_fill = [
        'from'     => User::class,
        'location' => Location::class
    ];

    public function getResultId(): string
    {
        return $this->result_id;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    public function getQuery(): string
    {
        return $this->query;
    }
}