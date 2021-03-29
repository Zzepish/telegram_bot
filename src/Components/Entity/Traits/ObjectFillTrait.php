<?php

namespace App\Components\Entity\Traits;

trait ObjectFillTrait
{
    protected array $objects_to_fill = [];

    public function fillObjects(array $data): array
    {
        foreach($this->objects_to_fill as $field => $object_type) {
            if(array_key_exists($field, $data)) {
                $data[$field] = new $object_type($data[$field]);
            }
        }
        return $data;
    }
}