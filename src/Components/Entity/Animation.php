<?php

namespace App\Components\Entity;

class Animation extends AbstractImmutableEntity
{
    protected string     $file_id;
    protected string     $file_unique_id;
    protected int        $width;
    protected int        $height;
    protected int        $duration;
    protected ?PhotoSize $thumb     = null;
    protected ?string    $file_name = null;
    protected ?string    $mime_type = null;
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

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
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