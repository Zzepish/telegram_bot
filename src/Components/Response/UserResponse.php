<?php

namespace App\Components\Response;

use App\Components\Entity\User;

class UserResponse extends AbstractResponse
{
    function handleData(array $data): User
    {
        return new User($data);
    }

    public function getData(): User
    {
        return $this->data;
    }

}