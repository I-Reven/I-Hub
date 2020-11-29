<?php

namespace IRaven\IHub;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use IRaven\IHub\Application\Listeners\PingListener;
use IRaven\IHub\Domain\Events\PingEvent;

/**
 * Class IHubEventServiceProvider
 * @package IRaven\IHub
 */
class IHubEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PingEvent::class => [
            PingListener::class,
        ]
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'IRaven\IHub\Application\Listeners\EventSubscriber',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
