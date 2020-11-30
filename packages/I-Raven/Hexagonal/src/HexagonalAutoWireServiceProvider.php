<?php

namespace IRaven\Hexagonal;

use IRaven\Hexagonal\Application\Handlers\ExceptionHandler;
use IRaven\Hexagonal\Application\Services\HexagonalService;
use IRaven\Hexagonal\Application\Services\PingService;
use IRaven\Hexagonal\Domain\Contracts\Handlers\ExceptionHandlerContract;
use IRaven\Hexagonal\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\Hexagonal\Domain\Contracts\Services\HexagonalServiceContract;
use IRaven\Hexagonal\Domain\Contracts\Services\PingServiceContract;
use IRaven\Hexagonal\Infra\Repositories\PingRepository;

/**
 * Class HexagonalAutoWireProvider
 * @package IRaven\Hexagonal
 */
class HexagonalAutoWireServiceProvider
{
    /**
     * @return string[]
     */
    public static function boot(): array
    {
        return [
            //Services
            PingServiceContract::class => PingService::class,
            HexagonalServiceContract::class => HexagonalService::class,

            //Handlers
            ExceptionHandlerContract::class => ExceptionHandler::class,

            //Repositories
            PingRepositoryContract::class => PingRepository::class
        ];
    }
}
