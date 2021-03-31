<?php

namespace App\Components\Entity;

class PhotoSize extends AbstractImmutableEntity
{
    protected string $file_id;
    protected string $file_unique_id;
    protected int    $width;
    protected int    $height;
    protected ?int   $file_size = null;

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getFileSize(): ?int
    {
        return $this->file_size;
    }
}