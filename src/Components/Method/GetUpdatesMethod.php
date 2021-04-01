<?php

namespace Zzepish\Components\Method;

use Zzepish\Components\Response\MessageResponse;
use Zzepish\Components\Response\ResponseInterface;
use Zzepish\Components\Response\UpdatesResponse;

class GetUpdatesMethod extends AbstractMethod
{
    public const TELEGRAM_METHOD = 'getUpdates';

    public function handleResponse(array $data): ResponseInterface
    {
        return new UpdatesResponse($data);
    }
}