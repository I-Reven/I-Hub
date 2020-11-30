<?php

namespace IRaven\IAdmin\Domain\Contracts\Services;

use IRaven\IAdmin\Domain\Exceptions\PingWriteException;
use IRaven\IAdmin\Domain\Models\Ping;

interface IAdminServiceContract
{
    /**
     * @param string $ip
     * @throws PingWriteException
     * @return Ping
     */
    public function ping(string $ip): Ping;
}
