<?php

namespace Zzepish\Components\Response;

interface ResponseInterface
{
    /**
     * @return mixed
     */
    public function getData();
    public function getRawData(): array;
    public function isOk(): bool;
}