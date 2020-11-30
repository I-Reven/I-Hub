<?php

namespace IRaven\IAdmin;

use IRaven\IAdmin\Application\Handlers\ExceptionHandler;
use IRaven\IAdmin\Application\Services\IAdminService;
use IRaven\IAdmin\Application\Services\PingService;
use IRaven\IAdmin\Domain\Contracts\Handlers\ExceptionHandlerContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Services\IAdminServiceContract;
use IRaven\IAdmin\Domain\Contracts\Services\PingServiceContract;
use IRaven\IAdmin\Infra\Repositories\PingRepository;

/**
 * Class IAdminAutoWireProvider
 * @package IRaven\IAdmin
 */
class IAdminAutoWireServiceProvider
{
    /**
     * @return string[]
     */
    public static function boot(): array
    {
        return [
            //Services
            PingServiceContract::class => PingService::class,
            IAdminServiceContract::class => IAdminService::class,

            //Handlers
            ExceptionHandlerContract::class => ExceptionHandler::class,

            //Repositories
            PingRepositoryContract::class => PingRepository::class
        ];
    }
}
