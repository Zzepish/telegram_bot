<?php

namespace Zzepish\Components\Entity;

use Zzepish\Components\Entity\Traits\ToArrayTrait;

abstract class AbstractImmutableEntity
{
    use ToArrayTrait;

    protected array $objects_to_fill = [];

    public function __construct(array $data)
    {
        $data = $this->fillObjects($data);
        $this->setProperties($data);
    }

    protected function setProperties(array $data): self
    {
        foreach ($data as $name => $value) {
            if(property_exists($this, $name)) {
                $this->$name = $value;
            }
        }

        return $this;
    }

    protected function fillObjects(array $data): array
    {
        foreach($this->objects_to_fill as $field => $object_type) {
            if(array_key_exists($field, $data)) {
                if(isset($data[$field][0])) {
                    foreach($data[$field] as $key => $object_data) {
                        $data[$field][$key] = new $object_type($data[$field][$key]);
                    }
                    continue;
                }
                $data[$field] = new $object_type($data[$field]);
            }
        }
        return $data;
    }
}