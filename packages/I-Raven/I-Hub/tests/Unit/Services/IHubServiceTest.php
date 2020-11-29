<?php


namespace IRaven\IHub\Tests\Unit\Services;


use IRaven\IHub\Application\Services\IHubService;
use IRaven\IHub\Domain\Contracts\Services\IHubServiceContract;
use IRaven\IHub\Domain\Contracts\Services\PingServiceContract;
use IRaven\IHub\Domain\Exceptions\PingWriteException;
use IRaven\IHub\Domain\Models\Ping;
use IRaven\IHub\Tests\TestCase;
use PHPUnit\Framework\MockObject\MockObject;


class IHubServiceTest extends TestCase
{
    /** @var IHubServiceContract|MockObject */
    private $service;

    /** @var PingServiceContract|MockObject */
    private $pingService;

    public function construct(): void
    {
        $this->pingService = $this->createMock(PingServiceContract::class);
        $this->service = new IHubService($this->pingService);
    }

    public function destruct(): void
    {
        // TODO: Implement destruct() method.
    }

    /**
     * @test
     * @throws PingWriteException
     */
    public function it_should_return_ping_when_try_to_ping()
    {
        /** @var Ping $ping */
        $ping = Ping::factory()->create();
        $ip = $this->faker->ipv4;

        $this->pingService->expects($this->once())->method('ping')->with($ip)->willReturn($ping);

        $result = $this->service->ping($ip);

        $this->assertSame($ping, $result);
    }
}
