<?php

namespace App;

use App\Components\Command\AbstractCommand;
use App\Components\Response;
use App\Components\Tools\FilterUnansweredUpdatesInterface;
use App\Components\Tools\UnansweredUpdatesFilterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class Telegram
{
    public const TELEGRAM_API_URI = 'https://api.telegram.org';

    protected Client                           $client;
    protected string                           $bot_token;
    protected string                           $bot_name;
    protected UnansweredUpdatesFilterInterface $unansweredUpdatesFilter;

    protected $runned_updates = [];

    /**
     * @var AbstractCommand[] $commands
     */
    protected array $commands = [];


    public function __construct(
        Client $client,
        UnansweredUpdatesFilterInterface $unansweredUpdatesFilter,
        $bot_token,
        $bot_name = ''
    ) {
        $this->client                  = $client;
        $this->unansweredUpdatesFilter = $unansweredUpdatesFilter;
        $this->bot_token               = $bot_token;
        $this->bot_name                = $bot_name;
    }

    public function getUpdates(
        int $limit = 100,
        int $timeout = 0,
        int $offset = 0,
        array $allowed_updates = []
    ): Response {
        $url      = $this->formQuery('getUpdates');
        $response = $this->sendRequest($url);
        $data     = json_decode($response->getBody(), true);
        $response = Response::fromUpdates($data);
        $updates  = $this->unansweredUpdatesFilter->getUnansweredUpdates($response->getUpdates());

        foreach ($updates as $update) {
            if (!in_array($update->getUpdateId(), $this->runned_updates)) {
                $this->runned_updates[] = $update->getUpdateId();
                foreach ($this->commands as $command) {
                    if ($command->isValid($update)) {
                        $command->execute($update);
                    }
                }
            }

            $this->unansweredUpdatesFilter->addUpdate($update);
        }

        return $response;
    }

    public function sendMessage(array $arguments)
    {
        $url = $this->formQuery('sendMessage', $arguments);

        return $this->sendRequest($url);
    }

    public function getMe(): Response
    {
        $url      = $this->formQuery('getMe');
        $response = $this->client->get($url);

        return Response::fromGetMe(json_decode($response->getBody(), true));
    }

    public function addCommand($command)
    {
        $this->commands[] = $command;
    }

    /**
     * @return AbstractCommand[]
     */
    public function getCommands(): array
    {
        return $this->commands;
    }

    public function formQuery(string $method, array $arguments = []): string
    {
        $url = self::TELEGRAM_API_URI . '/bot' . $this->bot_token . '/' . $method;
        if (!empty($arguments)) {
            $url .= '?' . http_build_query($arguments);
        }

        return $url;
    }

    protected function sendRequest(string $url): ResponseInterface
    {
        try {
            return $this->client->get($url);
        } catch (ClientException $exception) {
            return $exception->getResponse();
        }
    }
}