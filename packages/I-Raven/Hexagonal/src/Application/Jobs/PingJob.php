<?php

namespace IRaven\Hexagonal\Application\Jobs;

use IRaven\Hexagonal\Domain\Contracts\Services\PingServiceContract;
use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;

/**
 * Class PingJob
 * @package IRaven\Hexagonal\Application\Jobs
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
