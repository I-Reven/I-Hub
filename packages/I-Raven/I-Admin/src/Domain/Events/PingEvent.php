<?php

namespace IRaven\IAdmin\Domain\Events;

/**
 * Class PingEvent
 * @package IRaven\IAdmin\Domain\Events
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
