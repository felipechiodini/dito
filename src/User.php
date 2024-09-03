<?php

namespace LiveOficial\Dito;

use JsonSerializable;

class User implements JsonSerializable
{
    private $api;
    private $name;
    private $gender;
    private $birthDate;
    private $email;
    private $customData = [];

    public function __construct(ApiContract $api)
    {
        $this->api = $api;
    }

    public function addCustomData(string $key, string $value): self
    {
        $this->customData[$key] = $value;
        return $this;
    }

    public function setDocument(string $document): self
    {
        $this->addCustomData('cpf', $document);
        return $this;
    }

    public function setCellphone(string $cellphone): self
    {
        $this->addCustomData('telefone', $cellphone);
        return $this;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }
  
    public function setGender(Gender $gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function setBirthDate(string $birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getId(): string
    {
        return sha1($this->email);
    }

    public function register(): void
    {
        $this->api->registerUser($this);
    }

    public function update(): void
    {
        $this->api->updateUser($this);
    }

    public function jsonSerialize(): array
    {
        return [
            'user_data' => [
                'name' => $this->name,
                'email' => $this->email,
                'gender' => $this->gender,
                'birthday' => $this->birthDate,
                'data' => json_encode($this->customData)
            ]
        ];
    }
}
