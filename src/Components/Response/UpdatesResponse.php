<?php

namespace App\Components\Response;

use App\Components\Entity\Update;

class UpdatesResponse extends AbstractResponse
{
    /**
     * @var Update[] $data
     */
    protected $data = [];

    function handleData(array $updates): array
    {
        $data = [];
        foreach($updates as $update) {
            $data[] = new Update($update);
        }

        return $data;
    }

    /**
     * @return Update[]
     */
    public function getData(): array
    {
        return $this->data;
    }

}