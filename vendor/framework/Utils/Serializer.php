<?php

namespace framework\Utils;

use ReflectionProperty;

trait Serializer
{
    public function loadFromJson($json)
    {
        foreach ($json as $key => $value) {
            if (is_array($value)) {
                $reflection = new ReflectionProperty(get_class($this), $key);
                $reflectionType = $reflection->getType();
                $fieldName = $reflectionType->getName();
                $subObj = new $fieldName();
                $subObj->loadFromJson($value);
                $value = $subObj;
            }
            $this->{$key} = $value;
        }
    }
}