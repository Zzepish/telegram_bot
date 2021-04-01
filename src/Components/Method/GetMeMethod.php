<?php

namespace App\Components\Method;

use App\Components\Response\ResponseInterface;
use App\Components\Response\UserResponse;

class GetMeMethod extends AbstractMethod
{
    public const TELEGRAM_METHOD = 'getMe';

    public function handleResponse(array $data): ResponseInterface
    {
        return new UserResponse($data);
    }
}