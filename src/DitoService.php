<?php

namespace LiveOficial\Dito;

class DitoService
{
    private $api;

    public function __construct(ApiContract $api)
    {
        $this->api = $api;
    }

    public function user()
    {
        return new User($this->api);
    }

    public function event()
    {
        return new Event($this->api);
    }
}
