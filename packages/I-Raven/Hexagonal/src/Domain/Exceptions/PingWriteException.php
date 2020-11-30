<?php

namespace IRaven\Hexagonal\Domain\Exceptions;

use Exception;
use IRaven\Hexagonal\Domain\Models\Ping;

/**
 * Class PingWriteException
 * @package IRaven\Hexagonal\Domain\Exceptions
 */
class PingWriteException extends Exception
{
    public function __construct(Ping $ping, int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Can Not Write Ip: ' . $ping->ip, $code, $previous);
    }
}
