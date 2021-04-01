<?php

namespace Zzepish\Components\Entity;

class ChatMember extends AbstractImmutableEntity
{
    public const STATUS_CREATOR       = 'creator';
    public const STATUS_ADMINISTRATOR = 'administrator';
    public const STATUS_MEMBER        = 'member';
    public const STATUS_RESTRICTED    = 'restricted';
    public const STATUS_LEFT          = 'left';
    public const STATUS_KICKED        = 'kicked';

    protected User    $user;
    protected string  $status;
    protected ?string $custom_title              = null;
    protected ?bool   $is_anonymous              = null;
    protected ?bool   $can_be_edited             = null;
    protected ?bool   $can_manage_chat           = null;
    protected ?bool   $can_post_messages         = null;
    protected ?bool   $can_edit_messages         = null;
    protected ?bool   $can_delete_messages       = null;
    protected ?bool   $can_manage_voice_chats    = null;
    protected ?bool   $can_restrict_members      = null;
    protected ?bool   $can_promote_members       = null;
    protected ?bool   $can_change_info           = null;
    protected ?bool   $can_invite_users          = null;
    protected ?bool   $can_pin_messages          = null;
    protected ?bool   $is_member                 = null;
    protected ?bool   $can_send_messages         = null;
    protected ?bool   $can_send_media_messages   = null;
    protected ?bool   $can_send_polls            = null;
    protected ?bool   $can_send_other_messages   = null;
    protected ?bool   $can_add_web_page_previews = null;
    protected ?int    $until_date                = null;

    protected array $objects_to_fill = [
        'user' => User::class,
    ];

    public function getUser(): User
    {
        return $this->user;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCustomTitle(): ?string
    {
        return $this->custom_title;
    }

    public function getIsAnonymous(): ?bool
    {
        return $this->is_anonymous;
    }

    public function getCanBeEdited(): ?bool
    {
        return $this->can_be_edited;
    }

    public function getCanManageChat(): ?bool
    {
        return $this->can_manage_chat;
    }

    public function getCanPostMessages(): ?bool
    {
        return $this->can_post_messages;
    }

    public function getCanEditMessages(): ?bool
    {
        return $this->can_edit_messages;
    }

    public function getCanDeleteMessages(): ?bool
    {
        return $this->can_delete_messages;
    }

    public function getCanManageVoiceChats(): ?bool
    {
        return $this->can_manage_voice_chats;
    }

    public function getCanRestrictMembers(): ?bool
    {
        return $this->can_restrict_members;
    }

    public function getCanPromoteMembers(): ?bool
    {
        return $this->can_promote_members;
    }

    public function getCanChangeInfo(): ?bool
    {
        return $this->can_change_info;
    }

    public function getCanInviteUsers(): ?bool
    {
        return $this->can_invite_users;
    }

    public function getCanPinMessages(): ?bool
    {
        return $this->can_pin_messages;
    }

    public function getIsMember(): ?bool
    {
        return $this->is_member;
    }

    public function getCanSendMessages(): ?bool
    {
        return $this->can_send_messages;
    }

    public function getCanSendMediaMessages(): ?bool
    {
        return $this->can_send_media_messages;
    }

    public function getCanSendPolls(): ?bool
    {
        return $this->can_send_polls;
    }

    public function getCanSendOtherMessages(): ?bool
    {
        return $this->can_send_other_messages;
    }

    public function getCanAddWebPagePreviews(): ?bool
    {
        return $this->can_add_web_page_previews;
    }

    public function getUntilDate(): ?int
    {
        return $this->until_date;
    }
}