<?php

namespace App\Components\Entity;

class PollOption extends AbstractEntity
{
    private string $text;
    private int    $voter_count;

    public function getText(): string
    {
        return $this->text;
    }

    public function getVoterCount(): int
    {
        return $this->voter_count;
    }
}