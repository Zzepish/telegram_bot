<?php

namespace App\Components\Entity;

use App\Components\Entity\Traits\ObjectFillTrait;
use App\Components\Entity\Traits\PropertiesFromArrayTrait;

abstract class AbstractEntity
{
    use PropertiesFromArrayTrait;
    use ObjectFillTrait;

    public function __construct(array $data)
    {
        $data = $this->fillObjects($data);
        $this->setProperties($data);
    }
}