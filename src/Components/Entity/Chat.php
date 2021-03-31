<?php

namespace App\Components\Entity;

class Chat extends AbstractEntity
{
    private int        $id;
    private string     $type;
    private ?string    $title                    = null;
    private ?string    $username                 = null;
    private ?string    $first_name               = null;
    private ?string    $last_name                = null;
    private ?ChatPhoto $photo                    = null;
    private ?string    $bio                      = null;
    private ?string    $description              = null;
    private ?string    $invite_link              = null;
    private ?Message   $pinned_message           = null;
    private            $permissions              = null;
    private ?int       $slow_mode_delay          = null;
    private ?int       $message_auto_delete_time = null;
    private ?string    $sticker_set_name         = null;
    private ?bool      $can_set_sticker_set      = null;
    private ?int       $linked_chat_id           = null;
    private            $location                 = null;

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