<?php

namespace IRaven\IAdmin\Domain\Contracts\Repositories;

use IRaven\IAdmin\Domain\Models\Ping;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;

/**
 * Interface PingRepositoryContract
 * @package IRaven\IAdmin\Domain\Contract\Repository
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
