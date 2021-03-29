<?php

namespace App;

use App\Components\Entity\Message;
use App\Components\Entity\User;
use App\Components\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Telegram
{
    public const TELEGRAM_API_URI = 'https://api.telegram.org';

    protected Client $client;
    protected string $bot_token;
    protected string $bot_name;

    protected array $commands = [];


    public function __construct(Client $client, $bot_token, $bot_name = '')
    {
        $this->client    = $client;
        $this->bot_token = $bot_token;
        $this->bot_name  = $bot_name;
    }

    public function getUpdates(int $limit = 100, int $timeout = 0, int $offset = 0, array $allowed_updates = []): Response
    {
        $url = $this->formQuery('getUpdates');
        $response = $this->sendRequest($url);
        $data = json_decode($response->getBody(), true);

        foreach($this->commands as $command) {
            $command->execute(new Response($data));
        }

        return new Response($data);
    }

    public function sendMessage(array $arguments)
    {
        $url = $this->formQuery('sendMessage', $arguments);
        $response = $this->sendRequest($url);
        $r = 1;
        return $response;
    }

    public function getMe(): string
    {
        $url      = $this->formQuery('getMe');
        $response = $this->client->get($url);

        return (string)$response->getBody();
    }

    public function addCommand($command)
    {
        $this->commands[] = $command;
    }

    public function formQuery(string $method, array $arguments = []): string
    {
        $url = self::TELEGRAM_API_URI . '/bot' . $this->bot_token . '/' . $method;

        if(!empty($arguments)) {
            $url .= '?' . http_build_query($arguments);
        }

        return $url;
    }

    protected function sendRequest(string $url): ResponseInterface
    {
        try {
            return $this->client->get($url);
        } catch(ClientException $exception) {
            return $exception->getResponse();
        }
    }
}