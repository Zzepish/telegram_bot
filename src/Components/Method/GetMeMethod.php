<?php

namespace Zzepish\Components\Method;

use Zzepish\Components\Response\ResponseInterface;
use Zzepish\Components\Response\UserResponse;

class GetMeMethod extends AbstractMethod
{
    public const TELEGRAM_METHOD = 'getMe';

    public function handleResponse(array $data): ResponseInterface
    {
        return new UserResponse($data);
    }
}