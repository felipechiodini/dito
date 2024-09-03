<?php

namespace LiveOficial\Dito;

class Gender
{
    public $value;

    public function __construct(string $value)
    {
        if (in_array($value, ['male', 'female']) === false) {
            throw new \Exception('Genero inválido');
        }
        
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}