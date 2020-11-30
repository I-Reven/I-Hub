<?php

namespace IRaven\IAdmin;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use IRaven\IAdmin\Application\Listeners\PingListener;
use IRaven\IAdmin\Domain\Events\PingEvent;

/**
 * Class IAdminEventServiceProvider
 * @package IRaven\IAdmin
 */
class IAdminEventServiceProvider extends ServiceProvider
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
        'IRaven\IAdmin\Application\Listeners\EventSubscriber',
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
