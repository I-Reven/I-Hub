<?php

namespace IRaven\IHub\Application\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class IHub
 * @package IRaven\IHub\Application\Facades
 */
class IHubFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'i-hub';
    }
}
