<?php

namespace App\Components\Entity;

class Sticker extends AbstractImmutableEntity
{
    protected string        $file_id;
    protected string        $file_unique_id;
    protected int           $width;
    protected int           $height;
    protected bool          $is_animated;
    protected ?PhotoSize    $thumb         = null;
    protected ?string       $emoji         = null;
    protected ?string       $set_name      = null;
    protected ?MaskPosition $mask_position = null;
    protected ?int          $file_size     = null;

    protected array $objects_to_fill = [
        'thumb'         => PhotoSize::class,
        'mask_position' => MaskPosition::class
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

    public function isIsAnimated(): bool
    {
        return $this->is_animated;
    }

    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    public function getSetName(): ?string
    {
        return $this->set_name;
    }

    public function getMaskPosition(): ?MaskPosition
    {
        return $this->mask_position;
    }

    public function getFileSize(): ?int
    {
        return $this->file_size;
    }
}