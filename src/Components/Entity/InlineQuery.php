<?php

namespace App\Components\Entity;

class InlineQuery extends AbstractEntity
{
    private string    $id;
    private User      $from;
    private ?Location $location = null;
    private string    $query;
    private string    $offset;

    protected array $objects_to_fill = [
        'from'     => User::class,
        'location' => Location::class
    ];

    public function getId(): string
    {
        return $this->id;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function getOffset(): string
    {
        return $this->offset;
    }
}