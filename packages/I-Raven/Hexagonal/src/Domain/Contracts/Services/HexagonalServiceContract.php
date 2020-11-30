<?php

namespace IRaven\Hexagonal\Domain\Contracts\Services;

use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;
use IRaven\Hexagonal\Domain\Models\Ping;

interface HexagonalServiceContract
{
    /**
     * @param string $ip
     * @throws PingWriteException
     * @return Ping
     */
    public function ping(string $ip): Ping;
}
