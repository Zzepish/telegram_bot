<?php

namespace App\Components\Entity;

use App\Components\Entity\Traits\PropertiesFromArrayTrait;

class ChatPhoto
{
    use PropertiesFromArrayTrait;

    private string $small_file_id;
    private string $small_file_unique_id;
    private string $big_file_id;
    private string $big_file_unique_id;

    public function __construct(array $data)
    {
        $this->setProperties($data);
    }
}