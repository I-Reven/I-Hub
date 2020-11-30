<?php

namespace IRaven\IAdmin\Domain\Contracts\Services;

use IRaven\IAdmin\Domain\Models\Ping;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;

/**
 * Interface PingServiceContract
 * @package IRaven\IAdmin\Domain\Service
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
