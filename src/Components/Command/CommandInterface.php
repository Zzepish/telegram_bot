<?php

namespace App\Components\Command;

use App\Components\Response;

interface CommandInterface
{
    public function isValid(?Response $response): bool;
    public function execute(?Response $response);
}