<?php

namespace App;

use App\Components\Command\AbstractCommand;
use App\Components\Entity\Update;
use App\Components\Response;
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

    public function setWebhook(string $url, array $query, array $options)
    {
        //TODO finish implementation
        $this->formQuery('setWebhook', [

        ]);
    }

    public function deleteWebhook()
    {
        //TODO finish implementation
    }

    public function getUpdates(
        int $limit = 100,
        int $timeout = 0,
        int $offset = 0,
        array $allowed_updates = []
    ): Response {
        $response = $this->sendRequest($this->formQuery('getUpdates'), [
            'limit'           => $limit,
            'timeout'         => $timeout,
            'offset'          => $offset,
            'allowed_updates' => $allowed_updates
        ]);
        $data     = json_decode($response->getBody(), true);
        $response = Response::fromUpdates($data);

        return $response;
    }

    /**
     * @param Update[] $updates
     */
    public function handleUpdatesCommands(array $updates)
    {
        $updates = $this->unansweredUpdatesFilter->getUnansweredUpdates($updates);
        foreach ($updates as $update) {
            foreach ($this->commands as $command) {
                if ($command->isValid($update)) {
                    $command->execute($update);
                }
            }
            $this->unansweredUpdatesFilter->addUpdate($update);
        }
    }

    public function sendMessage(array $arguments)
    {
        return $this->sendRequest($this->formQuery('sendMessage', $arguments));
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

    protected function sendRequest(string $url, array $options = []): ResponseInterface
    {
        try {
            return $this->client->post($url, $options);
        } catch (ClientException $exception) {
            return $exception->getResponse();
        }
    }
}