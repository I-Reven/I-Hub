<?php

namespace IRaven\IHub\Domain\Contracts\Services;

use IRaven\IHub\Domain\Models\Ping;
use PingWriteException;

/**
 * Interface PingServiceContract
 * @package IRaven\IHub\Domain\Service
 */
interface PingServiceContract
{
    /**
     * @param string $ip
     * @throws PingWriteException
     * @return Ping
     */
    public function ping(string $ip): Ping;
}
