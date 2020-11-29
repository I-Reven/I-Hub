<?php

namespace IRaven\IHub\Domain\Events;

use IRaven\IHub\Domain\Models\Ping;

/**
 * Class PingEvent
 * @package IRaven\IHub\Domain\Events
 */
class PingEvent extends BaseEvent
{
    public $ip;

    /**
     * PingEvent constructor.
     * @param string $ip
     */
    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }
}
