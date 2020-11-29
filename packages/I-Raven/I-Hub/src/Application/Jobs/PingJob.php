<?php

namespace IRaven\IHub\Application\Jobs;

use IRaven\IHub\Domain\Contracts\Services\PingServiceContract;
use IRaven\IHub\Domain\Exceptions\PingWriteException;

/**
 * Class PingJob
 * @package IRaven\IHub\Application\Jobs
 */
class PingJob extends BaseJob
{
    private $ip;

    /**
     * PingJob constructor.
     * @param string $ip
     */
    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * @param PingServiceContract $pingService
     * @throws PingWriteException
     */
    public function handle(PingServiceContract $pingService)
    {
        $pingService->ping($this->ip);
    }
}
