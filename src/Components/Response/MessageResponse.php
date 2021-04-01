<?php

namespace Zzepish\Components\Response;

use Zzepish\Components\Entity\Message;

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