<?php

namespace IRaven\Hexagonal;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use IRaven\Hexagonal\Application\Listeners\PingListener;
use IRaven\Hexagonal\Domain\Events\PingEvent;

/**
 * Class HexagonalEventServiceProvider
 * @package IRaven\Hexagonal
 */
class HexagonalEventServiceProvider extends ServiceProvider
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
        'IRaven\Hexagonal\Application\Listeners\EventSubscriber',
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
