<?php

namespace IRaven\IHub\Domain\Exceptions;

use Exception;
use IRaven\IHub\Domain\Models\Ping;

/**
 * Class PingWriteException
 * @package IRaven\IHub\Domain\Exceptions
 */
class PingWriteException extends Exception
{
    public function __construct(Ping $ping, int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Can Not Write Ip: ' . $ping->ip, $code, $previous);
    }
}
