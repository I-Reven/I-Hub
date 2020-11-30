<?php

namespace IRaven\IAdmin\Application\Services;

use IRaven\IAdmin\Domain\Contracts\Services\IAdminServiceContract;
use IRaven\IAdmin\Domain\Contracts\Services\PingServiceContract;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;
use IRaven\IAdmin\Domain\Models\Ping;

/**
 * Class IAdmin
 * @package IRaven\IAdmin\Application\RPC
 */
class IAdminService implements IAdminServiceContract
{
    private $pingService;

    /**
     * IAdmin constructor.
     * @param PingServiceContract $pingService
     */
    public function __construct(PingServiceContract $pingService)
    {
        $this->pingService = $pingService;
    }

    /**
     * @param string $ip
     * @return Ping
     * @throws PingWriteException
     */
    public function ping(string $ip): Ping
    {
        return $this->pingService->ping($ip);
    }
}
