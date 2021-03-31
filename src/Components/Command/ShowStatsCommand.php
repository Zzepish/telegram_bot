<?php

namespace App\Components\Command;

use App\Components\Entity\Update;
use App\Components\Response;
use App\Telegram;

class ShowStatsCommand extends AbstractCommand
{
    protected string   $name        = 'Show stats';
    protected string   $description = 'Show stats of government website';
    protected string   $command     = 'showstats';
    protected Telegram $telegram;

    public static $voting_url = 'https://petition.president.gov.ua/petition/114468?fbclid=IwAR1gFOF77ppuhFqMMiZmEm2RUtwYJ6tsnqjDyc66gaqvIuPws4EYUCSdhXE';

    public function execute(?Update $update = null)
    {
        $arguments = explode(' ', $update->getMessage()->getText());
        $voting_url = self::$voting_url;
        if(count($arguments)  > 1) {
            $voting_url = $arguments[1];
        }

        $votes_amount = self::getVotingAmount($voting_url);
        $voting_left_days = self::getVotingLeftDays($voting_url);

        return $this->telegram->sendMessage([
            'chat_id' => $update->getMessage()->getChat()->getId(),
            'text'    => "Количество голосов: $votes_amount/25000"
                . PHP_EOL
                . 'Дней осталось: ' . $voting_left_days
                . PHP_EOL
                . $voting_url,
            'reply_to_message_id'         => $update->getMessage()->getMessageId(),
            'allow_sending_without_reply' => true,
        ]);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTelegram(): Telegram
    {
        return $this->telegram;
    }

    public static function getVotingAmount(string $voting_url): int
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($voting_url);
        preg_match('#<span>([0-9]+)</span>#', $response->getBody(), $matches);

        return (int)($matches[1] ?? 0);
    }

    public static function getVotingLeftDays(string $voting_url): int
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get($voting_url);
        preg_match('#Залишилося ([0-9]+)#', $response->getBody(), $matches);

        return (int)($matches[1] ?? 0);
    }
}