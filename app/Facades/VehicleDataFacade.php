<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class VehicleDataFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'getvehicledata';
    }
}
