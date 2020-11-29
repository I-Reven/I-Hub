<?php

namespace IRaven\IHub\Infra\Repositories;

use IRaven\IHub\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\IHub\Domain\Models\Ping;
use IRaven\IHub\Domain\Exceptions\PingWriteException;

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
