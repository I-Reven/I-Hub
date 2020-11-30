<?php

namespace IRaven\IAdmin;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use IRaven\IAdmin\Application\Services\IAdminService;
use IRaven\IAdmin\Application\Services\PingService;
use IRaven\IAdmin\Infra\Console\Kernel;
use IRaven\IAdmin\Infra\Console\PingCommand;

/**
 * Class IAdminServiceProvider
 * @package IRaven\IAdmin
 */
class IAdminServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/Infra/Resources/lang', 'i-admin');
        $this->loadViewsFrom(__DIR__ . '/Infra/Resources/views', 'i-admin');
        $this->loadMigrationsFrom(__DIR__ . '/Infra/Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/Infra/Routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/Infra/Routes/web.php');

        foreach (IAdminAutoWireServiceProvider::boot() as $contract => $class) {
            $this->app->bind($contract, $class);
        }

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        // Attach Package Console Kernel
        $this->app->booted(function () {
            (new Kernel())->schedule(app(Schedule::class));
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/Domain/Config/i-admin.php', 'i-admin');

        // Register Event Service Provider
        $this->app->register(IAdminEventServiceProvider::class);

        // Register the service the package provides.
        $this->app->singleton('i-admin', function ($app) {
            return new IAdminService($app->make(PingService::class));
        });

        /** Redirect Exception To Package Handler */
//        $this->app->singleton(ExceptionHandler::class, ExceptionHandlerContract::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['i-admin'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/Domain/Config/i-admin.php' => config_path('i-admin.php'),
        ], 'i-admin.config');

        // Publishing the views.
        $this->publishes([
            __DIR__ . '/Infra/Resources/views' => base_path('resources/views/vendor/i-raven'),
        ], 'i-admin.views');

        // Publishing assets.
        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/i-raven'),
        ], 'i-admin.views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/i-raven'),
        ], 'i-admin.views');

        // Registering package commands.
        $this->commands([
            PingCommand::class
        ]);
    }
}