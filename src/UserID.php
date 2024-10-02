<?php

namespace LiveOficial\Dito;

class ID implements UserIDContract
{
    private $value;

    public function __construct(string $id)
    {
        $this->value = preg_replace('/[^0-9]/', '', $id);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}