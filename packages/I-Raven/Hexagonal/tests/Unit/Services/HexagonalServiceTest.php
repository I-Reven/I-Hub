<?php


namespace IRaven\Hexagonal\Tests\Unit\Services;


use IRaven\Hexagonal\Application\Services\HexagonalService;
use IRaven\Hexagonal\Domain\Contracts\Services\HexagonalServiceContract;
use IRaven\Hexagonal\Domain\Contracts\Services\PingServiceContract;
use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;
use IRaven\Hexagonal\Domain\Models\Ping;
use IRaven\Hexagonal\Tests\TestCase;
use PHPUnit\Framework\MockObject\MockObject;


class HexagonalServiceTest extends TestCase
{
    /** @var HexagonalServiceContract|MockObject */
    private $service;

    /** @var PingServiceContract|MockObject */
    private $pingService;

    public function construct(): void
    {
        $this->pingService = $this->createMock(PingServiceContract::class);
        $this->service = new HexagonalService($this->pingService);
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
