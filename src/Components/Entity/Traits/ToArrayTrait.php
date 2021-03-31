<?php

namespace App\Components\Entity\Traits;

trait ToArrayTrait
{
    public function __toArray(): array
    {
        $vars = get_object_vars($this);

        foreach($vars as $key => $var) {
            if(is_object($var)) {
                $vars[$key] = $vars[$key]->__toArray();
                continue;
            }

            if(is_array($var) && isset($var[0]) && is_object($var[0])) {
                foreach($var as $sub_key => $entity) {
                    $var[$key][$sub_key] = $entity->__toArray();
                }
                continue;
            }
        }

        return $vars;
    }
}