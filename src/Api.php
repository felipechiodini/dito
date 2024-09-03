<?php

namespace LiveOficial\Dito;

use Illuminate\Support\Facades\Http;

final class Api implements ApiContract
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    private function baseRequest()
    {
        return Http::baseUrl('https://login.plataformasocial.com.br')
            ->asJson();
    }

    public function registerUser(User $user)
    {
        return $this->baseRequest()
            ->post("users/portal/{$user->getId()}/signup", [
                'id_type' => 'id',
                'sha1_signature' => sha1($this->config['secret']),
                'platform_api_key' => $this->config['app_key'],
                'network_name' => 'pt',
                'user_data' => $user
            ]);
    }

    public function updateUser(User $user)
    {
        return $this->baseRequest()
            ->put("users/{$user->getId()}/signup", [
                'id_type' => 'id',
                'sha1_signature' => sha1($this->config['secret']),
                'platform_api_key' => $this->config['app_key'],
                'network_name' => 'pt',
                'user_data' => $user
            ]);
    }

    public function sendEvent(Event $event)
    {
        return Http::baseUrl('http://events.plataformasocial.com.br')
            ->asJson()
            ->post("users/{$event->id}", [
                'id_type' => 'id',
                'sha1_signature' => sha1($this->config['secret']),
                'platform_api_key' => $this->config['app_key'],
                'network_name' => 'pt',
                'event' => $event
            ]);
    }
}