<?php

namespace IRaven\IHub\Application\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use IRaven\IHub\Application\Jobs\PingJob;
use IRaven\IHub\Domain\Events\PingEvent;
use Log;

/**
 * Class PingListener
 * @package IRaven\IHub\Application\Listeners
 */
class PingListener implements ShouldQueue
{
    /**
     * @param PingEvent $event
     */
    public function handle(PingEvent $event)
    {
        PingJob::dispatch($event->ip)->onQueue('pending')->delay(now()->addSeconds(3));
    }

    /**
     * @param PingEvent $event
     * @param $exception
     */
    public function failed(PingEvent $event, $exception)
    {
        Log::error($exception->getMessage());
    }
}
