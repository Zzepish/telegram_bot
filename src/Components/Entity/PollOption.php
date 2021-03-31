<?php

namespace App\Components\Entity;

class PollOption extends AbstractImmutableEntity
{
    protected string $text;
    protected int    $voter_count;

    public function getText(): string
    {
        return $this->text;
    }

    public function getVoterCount(): int
    {
        return $this->voter_count;
    }
}