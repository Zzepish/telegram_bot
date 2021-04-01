<?php

namespace Zzepish\Components\Entity;

class Update extends AbstractImmutableEntity
{
    protected int                 $update_id;
    protected ?Message            $message              = null;
    protected ?Message            $edited_message       = null;
    protected ?Message            $channel_post         = null;
    protected ?Message            $edited_channel_post  = null;
    protected ?InlineQuery        $inline_query         = null;
    protected ?ChosenInlineResult $chosen_inline_result = null;
    protected ?CallbackQuery      $callback_query       = null;
    protected ?ShippingQuery      $shipping_query       = null;
    protected ?PreCheckoutQuery   $pre_checkout_query   = null;
    protected ?Poll               $poll                 = null;
    protected ?PollAnswer         $poll_answer          = null;
    protected ?ChatMemberUpdated  $my_chat_member       = null;
    protected ?ChatMemberUpdated  $chat_member          = null;

    protected array $objects_to_fill = [
        'message'              => Message::class,
        'edited_message'       => Message::class,
        'channel_post'         => Message::class,
        'edited_channel_post'  => Message::class,
        'inline_query'         => InlineQuery::class,
        'chosen_inline_result' => ChosenInlineResult::class,
        'callback_query'       => CallbackQuery::class,
        'shipping_query'       => ShippingQuery::class,
        'poll'                 => Poll::class,
        'poll_answer'          => PollAnswer::class,
        'my_chat_member'       => ChatMemberUpdated::class,
        'chat_member'          => ChatMemberUpdated::class,
    ];

    public function getUpdateId(): int
    {
        return $this->update_id;
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function getEditedMessage(): ?Message
    {
        return $this->edited_message;
    }

    public function getChannelPost(): ?Message
    {
        return $this->channel_post;
    }

    public function getEditedChannelPost(): ?Message
    {
        return $this->edited_channel_post;
    }

    public function getInlineQuery(): ?InlineQuery
    {
        return $this->inline_query;
    }

    public function getChosenInlineResult(): ?ChosenInlineResult
    {
        return $this->chosen_inline_result;
    }

    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callback_query;
    }

    public function getShippingQuery(): ?ShippingQuery
    {
        return $this->shipping_query;
    }

    public function getPreCheckoutQuery(): ?PreCheckoutQuery
    {
        return $this->pre_checkout_query;
    }

    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    public function getPollAnswer(): ?PollAnswer
    {
        return $this->poll_answer;
    }

    public function getMyChatMember(): ?ChatMemberUpdated
    {
        return $this->my_chat_member;
    }

    public function getChatMember(): ?ChatMemberUpdated
    {
        return $this->chat_member;
    }
}