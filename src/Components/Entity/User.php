<?php

namespace App\Components\Entity;

class User extends AbstractEntity
{
    private int     $id;
    private bool    $is_bot;
    private ?string $first_name                  = null;
    private ?string $last_name                   = null;
    private ?string $username                    = null;
    private ?string $language_code               = null;
    private ?bool   $can_join_groups             = null;
    private ?bool   $can_read_all_group_messages = null;
    private ?bool   $supports_inline_queries     = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function isIsBot(): bool
    {
        return $this->is_bot;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getLanguageCode(): ?string
    {
        return $this->language_code;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function getCanJoinGroups(): ?bool
    {
        return $this->can_join_groups;
    }

    public function getCanReadAllGroupMessages(): ?bool
    {
        return $this->can_read_all_group_messages;
    }

    public function getSupportsInlineQueries(): ?bool
    {
        return $this->supports_inline_queries;
    }
}