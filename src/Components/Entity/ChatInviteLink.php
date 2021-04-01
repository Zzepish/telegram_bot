<?php

namespace Zzepish\Components\Entity;

class ChatInviteLink extends AbstractImmutableEntity
{
    protected string $invite_link;
    protected User   $creator;
    protected bool   $is_primary;
    protected bool   $is_revoked;
    protected ?int   $expire_date  = null;
    protected ?int   $member_limit = null;

    protected array $objects_to_fill = [
        'creator' => User::class,
    ];

    public function getInviteLink(): string
    {
        return $this->invite_link;
    }

    public function getCreator(): User
    {
        return $this->creator;
    }

    public function isIsPrimary(): bool
    {
        return $this->is_primary;
    }

    public function isIsRevoked(): bool
    {
        return $this->is_revoked;
    }

    public function getExpireDate(): ?int
    {
        return $this->expire_date;
    }

    public function getMemberLimit(): ?int
    {
        return $this->member_limit;
    }
}