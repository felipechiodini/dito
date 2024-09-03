<?php

namespace LiveOficial\Dito;

class UserID
{
    private $value;

    public function __construct(string $email)
    {
        $this->value = sha1($email);
    }

    public function __toString()
    {
        return $this->value;
    }
}