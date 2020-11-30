<?php

namespace IRaven\Hexagonal\Domain\Contracts\Repositories;

use IRaven\Hexagonal\Domain\Models\Ping;
use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;

/**
 * Interface PingRepositoryContract
 * @package IRaven\Hexagonal\Domain\Contract\Repository
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
