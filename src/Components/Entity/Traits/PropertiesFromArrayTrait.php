<?php

namespace App\Components\Entity\Traits;

trait PropertiesFromArrayTrait
{
    public function setProperties(array $data): self
    {
        foreach ($data as $name => $value) {
            $this->{$name} = $value;
        }

        return $this;
    }

    public function __set(string $name, $value)
    {
        if(property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }
}