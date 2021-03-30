<?php

namespace App\Components\Entity;

class ChatPhoto extends AbstractEntity
{
    private string $small_file_id;
    private string $small_file_unique_id;
    private string $big_file_id;
    private string $big_file_unique_id;

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