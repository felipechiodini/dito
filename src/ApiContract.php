<?php

namespace LiveOficial\Dito;

interface ApiContract
{
    public function registerUser(User $user);
    public function updateUser(User $user);
    public function sendEvent(Event $event);
}