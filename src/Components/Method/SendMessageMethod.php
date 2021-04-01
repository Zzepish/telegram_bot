<?php

namespace App\Components\Method;

use App\Components\Response\MessageResponse;
use App\Components\Response\ResponseInterface;

class SendMessageMethod extends AbstractMethod
{
    public const TELEGRAM_METHOD = 'sendMessage';

    public function handleResponse(array $data): ResponseInterface
    {
        return new MessageResponse($data);
    }
}