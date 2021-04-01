<?php

namespace App\Components\Method;

use App\Components\Response\ResponseInterface;

abstract class AbstractMethod
{
    public const TELEGRAM_METHOD = '';

    protected string $method = 'GET';

    public function getMethod(): string
    {
        return $this->method;
    }

    abstract public function handleResponse(array $data): ResponseInterface;
}