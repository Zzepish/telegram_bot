<?php

namespace App\Components\Entity;

class VideoNote extends AbstractImmutableEntity
{
    protected string     $file_id;
    protected string     $file_unique_id;
    protected int        $length;
    protected int        $duration;
    protected ?PhotoSize $thumb     = null;
    protected ?int       $file_size = null;

    protected array $objects_to_fill = [
        'thumb' => PhotoSize::class
    ];

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    public function getFileName(): ?string
    {
        return $this->file_name;
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