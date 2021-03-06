<?php


namespace Modules\Core\Notify\Facades;

use Illuminate\Support\Facades\Facade;

class Notify extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'notify';
    }
}

