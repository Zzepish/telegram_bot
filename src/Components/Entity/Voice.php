<?php

namespace App\Components\Entity;

class Voice extends AbstractImmutableEntity
{
    protected string  $file_id;
    protected string  $file_unique_id;
    protected int     $duration;
    protected ?string $mime_type = null;
    protected ?int    $file_size = null;

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    public function getFileSize(): ?int
    {
        return $this->file_size;
    }
}