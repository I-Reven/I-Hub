<?php

namespace IRaven\IAdmin\Domain\Exceptions;

use Exception;
use IRaven\IAdmin\Domain\Models\Ping;

/**
 * Class PingWriteException
 * @package IRaven\IAdmin\Domain\Exceptions
 */
class PingWriteException extends Exception
{
    public function __construct(Ping $ping, int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Can Not Write Ip: ' . $ping->ip, $code, $previous);
    }
}
