<?php

namespace IRaven\IHub\Application\Services;

use IRaven\IHub\Domain\Contracts\Services\PingServiceContract;

/**
 * Class IHub
 * @package IRaven\IHub\Application\RPC
 */
class IHubService
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
     */
    public function ping(string $ip): void
    {
        $this->pingService->ping($ip);
    }
}
