<?php

namespace IRaven\IAdmin\Application\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class IAdmin
 * @package IRaven\IAdmin\Application\Facades
 */
class IAdminFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'i-admin';
    }
}
