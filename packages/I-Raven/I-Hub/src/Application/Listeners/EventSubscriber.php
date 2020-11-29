<?php

namespace IRaven\IHub\Application\Listeners;

use IRaven\IHub\Domain\Events\PingEvent;
use Log;

/**
 * Class EventSubscriber
 * @package IRaven\IHub\Application\Listeners
 */
class EventSubscriber
{
    /**
     * Register the listeners for the subscriber.
     *
     * @return array
     */
    public function subscribe(): array
    {
        return [
            PingEvent::class => [
                [EventSubscriber::class, 'pingSubscriber']
            ]
        ];
    }

    /**
     * @param PingEvent $event
     */
    public function pingSubscriber(PingEvent $event)
    {
        Log::info("Subscribe Ping Event IP: " . $event->ip);
    }
}
