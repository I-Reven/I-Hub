<?php

namespace IRaven\IHub\Tests\Integration\Repositories;

use IRaven\IHub\Domain\Exceptions\PingWriteException;
use IRaven\IHub\Domain\Models\Ping;
use IRaven\IHub\Infra\Repositories\PingRepository;
use IRaven\IHub\Tests\TestCase;
use IRaven\IHub\Domain\Contracts\Repositories\PingRepositoryContract;

/**
 * Class PingRepositoryTest
 * @package IRaven\IHub\Tests\Integration\Repositories
 */
class PingRepositoryTest extends TestCase
{
    /** @var PingRepositoryContract */
    private $repository;

    public function construct(): void
    {
        $this->repository = new PingRepository();
    }

    public function destruct(): void
    {
        // TODO: Implement destruct() method.
    }

    /**
     * @test
     * @throws PingWriteException
     */
    public function it_should_crate_new_ping()
    {
        $ip = $this->faker->ipv4;

        $expected = $this->repository->pingIp($ip);

        $this->assertEquals($ip, $expected->ip);
        $this->assertDatabaseHas('pings', ['ip' => $ip]);
    }

    /**
     * @test
     */
    public function it_should_update_ping()
    {
        /** @var Ping $ping */
        $ping = Ping::factory()->create();

        $expected = $this->repository->pingIp($ping->ip);

        $this->assertEquals($ping->ip, $expected->ip);
        $this->assertDatabaseHas('pings', ['ip' => $ping->ip]);
    }
}
