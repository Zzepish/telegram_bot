<?php

namespace Zzepish\Components\Command;

use Zzepish\Components\Entity\Update;

interface CommandInterface
{
    public function isValid(Update $update): bool;
    public function execute(?Update $update = null);
    public function getCommand(): string;
}