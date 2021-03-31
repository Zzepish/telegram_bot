<?php

namespace App\Components\Tools;

use App\Components\Entity\Update;

interface UnansweredUpdatesFilterInterface
{
    /**
     * @param Update[] $updates
     *
     * @return Update[]
     */
    public function getUnansweredUpdates(array $updates): array;
    public function addUpdate(Update $update);
}