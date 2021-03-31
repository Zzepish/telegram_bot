<?php

namespace App\Components\Tools;

use App\Components\Entity\Update;

class UnansweredUpdatesFilterJSONFile implements UnansweredUpdatesFilterInterface
{
    protected string $file_path;
    protected array $updates_ids = [];

    public function __construct(string $file_path)
    {
        $this->file_path = $file_path;
        $this->initDataFromFile();
    }

    protected function initDataFromFile()
    {
        if(file_exists($this->file_path)) {
            $this->updates_ids = json_decode(file_get_contents($this->file_path), true);
        }
    }

    public function addUpdate(Update $update)
    {
        $this->updates_ids[] = $update->getUpdateId();
        $this->saveToFile();
    }

    public function getUnansweredUpdates(array $updates): array
    {
        $result = [];

        foreach($updates as $update) {
            /**
             * @var Update $update
             */
            if(!in_array($update->getUpdateId(), $this->updates_ids)) {
                $result[] = $update;
            }
        }
        return $result;
    }


    protected function saveToFile()
    {
        file_put_contents($this->file_path, json_encode(array_unique($this->updates_ids)));
    }

}