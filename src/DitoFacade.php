<?php

namespace LiveOficial\Dito;

use Illuminate\Support\Facades\Facade;

class DitoFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return DitoService::class;
    }
}
