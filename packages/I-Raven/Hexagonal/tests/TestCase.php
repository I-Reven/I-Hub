<?php

namespace IRaven\Hexagonal\Tests;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use IRaven\Hexagonal\HexagonalServiceProvider;
use Laravel\Telescope\Storage\DatabaseEntriesRepository;
use Orchestra\Testbench\TestCase as TestBench;
use Faker\Factory as FakerFactory;

/**
 * Class FeatureTestCase
 * @package IRaven\Hexagonal\Tests
 */
abstract class TestCase extends TestBench
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'testbench']);

        $this->construct();
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
    protected function getPackageProviders($app)
    {
        return [
            HexagonalServiceProvider::class,
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
    }

    /**
     * @param Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $config = $app->get('config');

        $config->set('logging.default', 'errorlog');

        $config->set('database.default', 'testbench');

        $config->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app->when(DatabaseEntriesRepository::class)
            ->needs('$connection')
            ->give('testbench');
    }
}
