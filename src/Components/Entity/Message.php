<?php

namespace App\Components\Entity;

class Message extends AbstractImmutableEntity
{
    protected int      $message_id;
    protected ?User    $from                    = null;
    protected ?Chat    $sender_chat             = null;
    protected int      $date;
    protected Chat     $chat;
    protected ?User    $forward_from            = null;
    protected ?Chat    $forward_from_chat       = null;
    protected ?int     $forward_from_message_id = null;
    protected ?string  $forward_sender_name     = null;
    protected ?int     $forward_date            = null;
    protected ?Message $reply_to_message        = null;
    protected ?User    $via_bot                 = null;
    protected ?int     $edit_date               = null;
    protected ?string  $media_group_id          = null;
    protected ?string  $author_signature        = null;
    protected ?string  $text                    = null;
    /**
     * @var MessageEntity[]|null $entities
     */
    protected ?array     $entities  = null;
    protected ?Animation $animation = null;
    protected ?Audio     $audio     = null;
    protected ?Document  $document  = null;
    /**
     * @var PhotoSize[]|null $photo
     */
    protected ?array     $photo      = null;
    protected ?Sticker   $sticker    = null;
    protected ?Video     $video      = null;
    protected ?VideoNote $video_note = null;
    protected ?Voice     $voice      = null;
    protected ?string    $caption    = null;
    /**
     * @var MessageEntity[]|null $caption_entities
     */
    protected ?array $caption_entities = null;
    /* protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;
     protected ?Chat  $sticker          = null;*/
    protected array $objects_to_fill = [
        'from'              => User::class,
        'sender_chat'       => Chat::class,
        'chat'              => Chat::class,
        'forward_from'      => User::class,
        'forward_from_chat' => Chat::class,
        'reply_to_message'  => Message::class,
        'via_bot'           => User::class,
        'animation'         => Animation::class,
        'audio'             => Audio::class,
        'document'          => Document::class,
        'photo'             => PhotoSize::class,
        'sticker'           => Sticker::class,
        'video'             => Video::class,
        'video_note'        => VideoNote::class,
        'voice'             => Voice::class,
        'caption_entities'  => MessageEntity::class
    ];

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function getFrom(): ?User
    {
        return $this->from;
    }

    public function getSenderChat(): ?Chat
    {
        return $this->sender_chat;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function getForwardFrom(): ?User
    {
        return $this->forward_from;
    }

    public function getForwardFromChat(): ?Chat
    {
        return $this->forward_from_chat;
    }

    public function getForwardFromMessageId(): ?int
    {
        return $this->forward_from_message_id;
    }

    public function getForwardSenderName(): ?string
    {
        return $this->forward_sender_name;
    }

    public function getForwardDate(): ?int
    {
        return $this->forward_date;
    }

    public function getReplyToMessage(): ?Message
    {
        return $this->reply_to_message;
    }

    public function getViaBot(): ?User
    {
        return $this->via_bot;
    }

    public function getEditDate(): ?int
    {
        return $this->edit_date;
    }

    public function getMediaGroupId(): ?string
    {
        return $this->media_group_id;
    }

    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function getEntities(): ?array
    {
        return $this->entities;
    }

    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function getVideoNote(): ?VideoNote
    {
        return $this->video_note;
    }

    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }
}