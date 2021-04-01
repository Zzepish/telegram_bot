<?php

namespace App\Components\Response;

use App\Components\Entity\Message;

class MessageResponse extends AbstractResponse
{
    function handleData(array $data): Message
    {
        return new Message($data);
    }

    public function getData(): Message
    {
        return $this->data;
    }

}