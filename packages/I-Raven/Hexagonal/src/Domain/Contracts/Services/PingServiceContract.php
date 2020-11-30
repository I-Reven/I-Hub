<?php

namespace IRaven\Hexagonal\Domain\Contracts\Services;

use IRaven\Hexagonal\Domain\Models\Ping;
use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;

/**
 * Interface PingServiceContract
 * @package IRaven\Hexagonal\Domain\Service
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
