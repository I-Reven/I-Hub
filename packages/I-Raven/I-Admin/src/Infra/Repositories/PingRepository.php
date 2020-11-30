<?php

namespace IRaven\IAdmin\Infra\Repositories;

use IRaven\IAdmin\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\IAdmin\Domain\Models\Ping;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;

/**
 * Class PingRepository
 */
class PingRepository implements PingRepositoryContract
{
    /**
     * @param string $ip
     * @return Ping
     * @throws PingWriteException
     */
    public function pingIp(string $ip): Ping
    {
        $ping = Ping::where('ip', $ip)->firstOrNew();

        $ping->ip = $ip;
        $ping->updated_at = now();

        if (!$ping->save()) {
            throw new PingWriteException($ping);
        }

        return $ping;
    }
}
