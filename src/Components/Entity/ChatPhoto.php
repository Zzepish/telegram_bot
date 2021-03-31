<?php

namespace App\Components\Entity;

class ChatPhoto extends AbstractImmutableEntity
{
    protected string $small_file_id;
    protected string $small_file_unique_id;
    protected string $big_file_id;
    protected string $big_file_unique_id;

    public function getSmallFileId(): string
    {
        return $this->small_file_id;
    }

    public function getSmallFileUniqueId(): string
    {
        return $this->small_file_unique_id;
    }

    public function getBigFileId(): string
    {
        return $this->big_file_id;
    }

    public function getBigFileUniqueId(): string
    {
        return $this->big_file_unique_id;
    }
}