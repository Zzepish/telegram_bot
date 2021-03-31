<?php

namespace App\Components\Entity;

class ChatInviteLink extends AbstractEntity
{
    private string $invite_link;
    private User   $creator;
    private bool   $is_primary;
    private bool   $is_revoked;
    private ?int   $expire_date  = null;
    private ?int   $member_limit = null;

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