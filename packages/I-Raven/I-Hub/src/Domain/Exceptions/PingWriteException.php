<?php

use IRaven\IHub\Domain\Models\Ping;

/**
 * Class PingWriteException
 */
class PingWriteException extends Exception
{
    public function __construct(Ping $ping, int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Can Not Write Id' . $ping->ip, $code, $previous);
    }
}
