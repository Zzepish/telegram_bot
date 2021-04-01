<?php

namespace Zzepish\Components\Entity;

class Chat extends AbstractImmutableEntity
{
    protected int        $id;
    protected string     $type;
    protected ?string    $title                    = null;
    protected ?string    $username                 = null;
    protected ?string    $first_name               = null;
    protected ?string    $last_name                = null;
    protected ?ChatPhoto $photo                    = null;
    protected ?string    $bio                      = null;
    protected ?string    $description              = null;
    protected ?string    $invite_link              = null;
    protected ?Message   $pinned_message           = null;
    protected            $permissions              = null;
    protected ?int       $slow_mode_delay          = null;
    protected ?int       $message_auto_delete_time = null;
    protected ?string    $sticker_set_name         = null;
    protected ?bool      $can_set_sticker_set      = null;
    protected ?int       $linked_chat_id           = null;
    protected            $location                 = null;

    protected array $objects_to_fill = [
        'photo'          => ChatPhoto::class,
        'pinned_message' => Message::class
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getInviteLink(): ?string
    {
        return $this->invite_link;
    }

    public function getPinnedMessage(): ?Message
    {
        return $this->pinned_message;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function getSlowModeDelay(): ?int
    {
        return $this->slow_mode_delay;
    }

    public function getMessageAutoDeleteTime(): ?int
    {
        return $this->message_auto_delete_time;
    }

    public function getStickerSetName(): ?string
    {
        return $this->sticker_set_name;
    }

    public function getCanSetStickerSet(): ?bool
    {
        return $this->can_set_sticker_set;
    }

    public function getLinkedChatId(): ?int
    {
        return $this->linked_chat_id;
    }

    public function getLocation()
    {
        return $this->location;
    }
}