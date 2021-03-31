<?php

namespace App\Components\Command;

use App\Components\Entity\Update;

interface CommandInterface
{
    public function isValid(Update $update): bool;
    public function execute(?Update $update = null);
    public function getCommand(): string;
}