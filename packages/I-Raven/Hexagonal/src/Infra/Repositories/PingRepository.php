<?php

namespace IRaven\Hexagonal\Infra\Repositories;

use IRaven\Hexagonal\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\Hexagonal\Domain\Models\Ping;
use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;

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
