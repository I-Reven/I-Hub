<?php

namespace IRaven\IHub\Application\Services;

use IRaven\IHub\Domain\Contracts\Services\IHubServiceContract;
use IRaven\IHub\Domain\Contracts\Services\PingServiceContract;
use IRaven\IHub\Domain\Exceptions\PingWriteException;
use IRaven\IHub\Domain\Models\Ping;

/**
 * Class IHub
 * @package IRaven\IHub\Application\RPC
 */
class IHubService implements IHubServiceContract
{
    private $pingService;

    /**
     * IHub constructor.
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
