<?php

namespace App\Components\Entity;

class Update extends AbstractEntity
{
    private int                 $update_id;
    private ?Message            $message              = null;
    private ?Message            $edited_message       = null;
    private ?Message            $channel_post         = null;
    private ?Message            $edited_channel_post  = null;
    private ?InlineQuery        $inline_query         = null;
    private ?ChosenInlineResult $chosen_inline_result = null;
    private ?CallbackQuery      $callback_query       = null;
    private                     $shipping_query;
    private                     $pre_checkout_query;
    private                     $poll;
    private                     $poll_answer;
    private                     $my_chat_member;
    private                     $chat_member;

    protected array $objects_to_fill = [
        'message'              => Message::class,
        'edited_message'       => Message::class,
        'channel_post'         => Message::class,
        'edited_channel_post'  => Message::class,
        'inline_query'         => InlineQuery::class,
        'chosen_inline_result' => ChosenInlineResult::class
    ];
}