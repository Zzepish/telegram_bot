<?php

namespace App\Components\Method;

use App\Components\Response\MessageResponse;
use App\Components\Response\ResponseInterface;
use App\Components\Response\UpdatesResponse;

class GetUpdatesMethod extends AbstractMethod
{
    public const TELEGRAM_METHOD = 'getUpdates';

    public function handleResponse(array $data): ResponseInterface
    {
        return new UpdatesResponse($data);
    }
}