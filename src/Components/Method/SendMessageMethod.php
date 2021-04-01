<?php

namespace Zzepish\Components\Method;

use Zzepish\Components\Response\MessageResponse;
use Zzepish\Components\Response\ResponseInterface;

class SendMessageMethod extends AbstractMethod
{
    public const TELEGRAM_METHOD = 'sendMessage';

    public function handleResponse(array $data): ResponseInterface
    {
        return new MessageResponse($data);
    }
}