<?php

namespace Zzepish\Components\Response;

abstract class AbstractResponse implements ResponseInterface
{
    protected bool $ok;

    protected array $raw_data;

    protected ?string $error_message = null;

    /**
     * @var mixed $data
     */
    protected $data;

    public function __construct(array $raw_data)
    {
        $this->raw_data = $raw_data;
        $this->ok       = $raw_data['ok'] ?? false;
        if ($this->isOk()) {
            $this->data = $this->handleData($raw_data['result']);
        } else {
            $this->error_message = $raw_data['description'];
        }
    }

    public function isOk(): bool
    {
        return $this->ok;
    }

    public function getRawData(): array
    {
        return $this->raw_data;
    }

    abstract function handleData(array $data);
}