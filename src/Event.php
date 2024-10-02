<?php

namespace LiveOficial\Dito;

class Event
{
    public $id;

    private $api;
    private $action;
    private $revenue;
    private $props = [];

    public function __construct(ApiContract $api)
    {
        $this->api = $api;
    }

    public function setID(UserIDContract $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setRevenue($revenue): self
    {
        $this->revenue = $revenue;
        return $this;
    }

    public function addCustomProperty(string $key, string $value): self
    {
        $this->props[$key] = $value;
        return $this;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    public function send()
    {
        return $this->api->sendEvent($this);
    }

    public function __toString()
    {
        $data = [
            'action' => $this->action
        ];

        if ($this->revenue) $data['revenue'] = $this->revenue;

        foreach ($this->props as $key => $value) {
            $data['data'][$key] = $value;
        }

        return json_encode($data);
    }
}
