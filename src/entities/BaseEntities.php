<?php

    declare(strict_types = 1);

    namespace Coco\telegraph\entities;

abstract class BaseEntities
{
    public function __construct($parameters = [])
    {
        foreach ($parameters as $key => $value) {
            $this->$key = $value;
        }
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), 256);
    }

    abstract public function toArray(): array;
}
