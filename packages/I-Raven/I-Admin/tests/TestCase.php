<?php

namespace IRaven\IAdmin\Tests;

use Event;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use IRaven\IAdmin\Domain\Models\Partner;
use IRaven\IAdmin\IAdminServiceProvider;
use IRaven\IAdmin\Infra\Database\Seeders\IAdminDatabaseSeeder;
use Laravel\Telescope\Storage\DatabaseEntriesRepository;
use Orchestra\Testbench\TestCase as TestBench;
use Spatie\Multitenancy\Concerns\UsesMultitenancyConfig;
use Spatie\Multitenancy\Events\MadeTenantCurrentEvent;
use Spatie\Multitenancy\MultitenancyServiceProvider;

/**
 * Class FeatureTestCase
 * @package IRaven\IAdmin\Tests
 */
abstract class TestCase extends TestBench
{
    use RefreshDatabase, WithFaker, UsesMultitenancyConfig;

    protected function setUp(): void
    {
        parent::setUp();

        Event::listen(MadeTenantCurrentEvent::class, function () {
            $this->beginDatabaseTransaction();
        });

        IAdminDatabaseSeeder::run();

        Partner::first()->makeCurrent();

        $this->construct();
    }

    protected function connectionsToTransact(): array
    {
        return [
            $this->landlordDatabaseConnectionName(),
            $this->tenantDatabaseConnectionName(),
        ];
    }


    protected function tearDown(): void
    {
        parent::tearDown();
        $this->destruct();
    }

    public abstract function construct(): void;

    public abstract function destruct(): void;

    /**
     * @param Application $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            IAdminServiceProvider::class,
            MultitenancyServiceProvider::class,
        ];
    }

    /**
     * @param Application $app
     */
    protected function resolveApplicationCore($app)
    {
        parent::resolveApplicationCore($app);

        $app->detectEnvironment(function () {
            return 'self-testing';
        });

        $app->afterResolving('migrator', function ($migrator) {
            $migrator->path('vendor/i-raven/i-admin/src/Infra/Database/Migrations/partner');
            $migrator->path('vendor/i-raven/i-admin/src/Infra/Database/Migrations/landlord');
        });
    }

    /**
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $config = $app->get('config');

        $config->set('logging.default', 'errorlog');

        $config->set('database.default', 'testing');

        $config->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' =>'testing',
            'prefix' => '',
            'foreign_key_constraints' => true,
        ]);

        $config->set('database.connections.landlord', [
            'driver' => 'sqlite',
            'database' =>'testing',
            'prefix' => '',
            'foreign_key_constraints' => true,
        ]);

        $config->set('database.connections.partner', [
            'driver' => 'sqlite',
            'database' =>'testing',
            'prefix' => '',
            'foreign_key_constraints' => true,
        ]);

        $app->when(DatabaseEntriesRepository::class)
            ->needs('$connection')
            ->give('testing');
    }
}
