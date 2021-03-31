<?php

namespace App\Components\Entity;

class Poll extends AbstractEntity
{
    public const TYPE_REGULAR = 'regular';
    public const TYPE_QUIZ    = 'quiz';


    private string $id;
    private string $question;
    /**
     * @var PollOption[]
     */
    private array   $options;
    private int     $total_voter_count;
    private bool    $is_closed;
    private bool    $is_anonymous;
    private string  $type;
    private bool    $allows_multiple_answers;
    private ?int    $correct_option_id = null;
    private ?string $explanation       = null;
    /**
     * @var MessageEntity[]
     */
    private ?array $explanation_entities = null;
    private ?int   $open_period          = null;
    private ?int   $close_date           = null;

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