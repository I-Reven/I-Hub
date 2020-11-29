<?php

namespace IRaven\IHub\Domain\Contracts\Repositories;

use IRaven\IHub\Domain\Models\Ping;
use PingWriteException;

/**
 * Interface PingRepositoryContract
 * @package IRaven\IHub\Domain\Contract\Repository
 */
interface PingRepositoryContract
{
    /**
     * @param string $ip
     * @return Ping
     * @throws PingWriteException
     */
    public function pingIp(string $ip): Ping;
}
