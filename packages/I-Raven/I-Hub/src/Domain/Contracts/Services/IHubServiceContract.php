<?php

namespace IRaven\IHub\Domain\Contracts\Services;

use IRaven\IHub\Domain\Exceptions\PingWriteException;
use IRaven\IHub\Domain\Models\Ping;

interface IHubServiceContract
{
    /**
     * @param string $ip
     * @throws PingWriteException
     * @return Ping
     */
    public function ping(string $ip): Ping;
}
