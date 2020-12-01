<?php

namespace IRaven\IAdmin;

use IRaven\IAdmin\Application\Handlers\ExceptionHandler;
use IRaven\IAdmin\Application\Services\AuthService;
use IRaven\IAdmin\Application\Services\IAdminService;
use IRaven\IAdmin\Application\Services\PingService;
use IRaven\IAdmin\Domain\Contracts\Handlers\ExceptionHandlerContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\AdminRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\PartnerRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\UserRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Services\AuthServiceContract;
use IRaven\IAdmin\Domain\Contracts\Services\IAdminServiceContract;
use IRaven\IAdmin\Domain\Contracts\Services\PingServiceContract;
use IRaven\IAdmin\Infra\Repositories\AdminRepository;
use IRaven\IAdmin\Infra\Repositories\PartnerRepository;
use IRaven\IAdmin\Infra\Repositories\PingRepository;
use IRaven\IAdmin\Infra\Repositories\UserRepository;

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
            AuthServiceContract::class => AuthService::class,

            //Handlers
            ExceptionHandlerContract::class => ExceptionHandler::class,

            //Repositories
            PingRepositoryContract::class => PingRepository::class,
            UserRepositoryContract::class => UserRepository::class,
            AdminRepositoryContract::class => AdminRepository::class,
            PartnerRepositoryContract::class => PartnerRepository::class,
        ];
    }
}
