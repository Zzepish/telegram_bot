<?php

namespace App\Components\Entity;

class MessageEntity extends AbstractEntity
{
    public const TYPE_MENTION       = 'mention';
    public const TYPE_HASHTAG       = 'hashtag';
    public const TYPE_CASHTAG       = 'cashtag';
    public const TYPE_BOT_COMMAND   = 'bot_command';
    public const TYPE_URL           = 'url';
    public const TYPE_EMAIL         = 'email';
    public const TYPE_PHONE_NUMBER  = 'phone_number';
    public const TYPE_BOLD          = 'bold';
    public const TYPE_ITALIC        = 'italic';
    public const TYPE_UNDERLINE     = 'underline';
    public const TYPE_STRIKETHROUGH = 'strikethrough';
    public const TYPE_CODE          = 'code';
    public const TYPE_PRE           = 'pre';
    public const TYPE_TEXT_LINK     = 'text_link';
    public const TYPE_TEXT_MENTION  = 'text_mention';

    private string  $type;
    private int     $offset;
    private int     $length;
    private ?string $url      = null;
    private ?User   $user     = null;
    private ?string $language = null;

    protected array $objects_to_fill = [
        'user' => User::class
    ];

    public function getType(): string
    {
        return $this->type;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }
}