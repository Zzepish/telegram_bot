<?php

namespace Zzepish;

use Zzepish\Components\Command\AbstractCommand;
use Zzepish\Components\Entity\Update;
use Zzepish\Components\Method\AbstractMethod;
use Zzepish\Components\Response\ResponseInterface;
use Zzepish\Components\Tools\UnansweredUpdatesFilterInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

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

    /**
     * @var AbstractMethod[] $methods
     */
    protected array $methods = [];


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

    public function setWebhook(string $url, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        $options['url'] = $url;
        $url            = $this->formQuery('setWebhook');
        return $this->sendRequest('POST', $url, $options);
    }

    public function deleteWebhook(array $query = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->sendRequest('GET', $this->formQuery('deleteWebhook', $query));
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

    public function addCommand(AbstractCommand $command)
    {
        $this->commands[] = $command;
    }

    public function addMethod(AbstractMethod $method)
    {
        $this->methods[$method::TELEGRAM_METHOD] = $method;
    }

    public function runMethod(string $method, array $query = [], array $options = []): ResponseInterface
    {
        if (array_key_exists($method, $this->methods)) {
            $method   = $this->methods[$method];
            $url      = $this->formQuery($method::TELEGRAM_METHOD, $query);
            $response = $this->sendRequest($method->getMethod(), $url, $options);

            return $method->handleResponse(json_decode($response->getBody(), true));
        }
        throw new \Exception('Telegram method "' . $method . '" is not in the list.');
    }

    /**
     * @return AbstractCommand[]
     */
    public function getCommands(): array
    {
        return $this->commands;
    }

    /**
     * @return AbstractMethod[]
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    public function formQuery(string $method, array $query = []): string
    {
        $url = self::TELEGRAM_API_URI . '/bot' . $this->bot_token . '/' . $method;
        if (!empty($query)) {
            $url .= '?' . http_build_query($query);
        }

        return $url;
    }

    protected function sendRequest(
        string $method,
        string $url,
        array $options = []
    ): \Psr\Http\Message\ResponseInterface {
        try {
            return $this->client->request($method, $url, $options);
        } catch (ClientException $exception) {
            return $exception->getResponse();
        }
    }
}