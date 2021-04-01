<?php

namespace Zzepish\Components\Entity;

class Poll extends AbstractImmutableEntity
{
    public const TYPE_REGULAR = 'regular';
    public const TYPE_QUIZ    = 'quiz';


    protected string $id;
    protected string $question;
    /**
     * @var PollOption[]
     */
    protected array   $options;
    protected int     $total_voter_count;
    protected bool    $is_closed;
    protected bool    $is_anonymous;
    protected string  $type;
    protected bool    $allows_multiple_answers;
    protected ?int    $correct_option_id = null;
    protected ?string $explanation       = null;
    /**
     * @var MessageEntity[]
     */
    protected ?array $explanation_entities = null;
    protected ?int   $open_period          = null;
    protected ?int   $close_date           = null;

    protected array $objects_to_fill = [
        'options'              => PollOption::class,
        'explanation_entities' => MessageEntity::class
    ];

    public function getId(): string
    {
        return $this->id;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getTotalVoterCount(): int
    {
        return $this->total_voter_count;
    }

    public function isIsClosed(): bool
    {
        return $this->is_closed;
    }

    public function isIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function isAllowsMultipleAnswers(): bool
    {
        return $this->allows_multiple_answers;
    }

    public function getCorrectOptionId(): ?int
    {
        return $this->correct_option_id;
    }

    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    public function getExplanationEntities(): ?array
    {
        return $this->explanation_entities;
    }

    public function getOpenPeriod(): ?int
    {
        return $this->open_period;
    }

    public function getCloseDate(): ?int
    {
        return $this->close_date;
    }
}