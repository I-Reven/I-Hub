<?php

namespace IRaven\Hexagonal\Application\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Hexagonal
 * @package IRaven\Hexagonal\Application\Facades
 */
class HexagonalFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'hexagonal';
    }
}
