<?php

namespace IRaven\IHub;

use IRaven\IHub\Application\Handlers\ExceptionHandler;
use IRaven\IHub\Application\Services\IHubService;
use IRaven\IHub\Application\Services\PingService;
use IRaven\IHub\Domain\Contracts\Handlers\ExceptionHandlerContract;
use IRaven\IHub\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\IHub\Domain\Contracts\Services\IHubServiceContract;
use IRaven\IHub\Domain\Contracts\Services\PingServiceContract;
use IRaven\IHub\Infra\Repositories\PingRepository;

/**
 * Class IHubAutoWireProvider
 * @package IRaven\IHub
 */
class IHubAutoWireServiceProvider
{
    /**
     * @return string[]
     */
    public static function boot(): array
    {
        return [
            //Services
            PingServiceContract::class => PingService::class,
            IHubServiceContract::class => IHubService::class,

            //Handlers
            ExceptionHandlerContract::class => ExceptionHandler::class,

            //Repositories
            PingRepositoryContract::class => PingRepository::class
        ];
    }
}
