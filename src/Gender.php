<?php

namespace LiveOficial\Dito;

class Gender
{
    public $value;

    public function __construct(string $value)
    {
        if (in_array($value, ['male', 'female'])) {
            $this->value = $value;
        }

        throw new \Exception('Genero inválido');
    }

    public function __toString()
    {
        return $this->value;
    }
}