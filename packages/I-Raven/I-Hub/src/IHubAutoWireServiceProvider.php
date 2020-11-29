<?php

namespace IRaven\IHub;

use IRaven\IHub\Application\Jobs\PingJob;
use IRaven\IHub\Application\Services\PingService;
use IRaven\IHub\Domain\Contracts\Jobs\PingJobContract;
use IRaven\IHub\Domain\Contracts\Repositories\PingRepositoryContract;
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

            //Repositories
            PingRepositoryContract::class => PingRepository::class
        ];
    }
}
