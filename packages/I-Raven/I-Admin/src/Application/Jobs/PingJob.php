<?php

namespace IRaven\IAdmin\Application\Jobs;

use IRaven\IAdmin\Domain\Contracts\Services\PingServiceContract;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;

/**
 * Class PingJob
 * @package IRaven\IAdmin\Application\Jobs
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
