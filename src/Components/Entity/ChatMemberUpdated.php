<?php

namespace App\Components\Entity;

class ChatMemberUpdated extends AbstractEntity
{
    private Chat $chat;
    private User $from;
    private int $date;
    private ChatMember $old_chat_member;
    private ChatMember $new_chat_member;
    private ?ChatInviteLink $invite_link = null;

    protected array $objects_to_fill = [
      'chat' => Chat::class,
      'from' => User::class,
      'old_chat_member' => ChatMember::class,
      'new_chat_member' => ChatMember::class,
      'invite_link'     => ChatInviteLink::class
    ];

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getOldChatMember(): ChatMember
    {
        return $this->old_chat_member;
    }

    public function getNewChatMember(): ChatMember
    {
        return $this->new_chat_member;
    }

    public function getInviteLink(): ?ChatInviteLink
    {
        return $this->invite_link;
    }
}