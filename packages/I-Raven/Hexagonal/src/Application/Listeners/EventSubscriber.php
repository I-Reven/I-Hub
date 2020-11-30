<?php

namespace IRaven\Hexagonal\Application\Listeners;

use IRaven\Hexagonal\Domain\Events\PingEvent;
use Log;

/**
 * Class EventSubscriber
 * @package IRaven\Hexagonal\Application\Listeners
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
