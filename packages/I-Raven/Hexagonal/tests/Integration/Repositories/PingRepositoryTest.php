<?php

namespace IRaven\Hexagonal\Tests\Integration\Repositories;

use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;
use IRaven\Hexagonal\Domain\Models\Ping;
use IRaven\Hexagonal\Infra\Repositories\PingRepository;
use IRaven\Hexagonal\Tests\TestCase;
use IRaven\Hexagonal\Domain\Contracts\Repositories\PingRepositoryContract;

/**
 * Class PingRepositoryTest
 * @package IRaven\Hexagonal\Tests\Integration\Repositories
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
