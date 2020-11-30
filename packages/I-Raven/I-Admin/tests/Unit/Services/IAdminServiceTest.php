<?php


namespace IRaven\IAdmin\Tests\Unit\Services;


use IRaven\IAdmin\Application\Services\IAdminService;
use IRaven\IAdmin\Domain\Contracts\Services\IAdminServiceContract;
use IRaven\IAdmin\Domain\Contracts\Services\PingServiceContract;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;
use IRaven\IAdmin\Domain\Models\Ping;
use IRaven\IAdmin\Tests\TestCase;
use PHPUnit\Framework\MockObject\MockObject;


class IAdminServiceTest extends TestCase
{
    /** @var IAdminServiceContract|MockObject */
    private $service;

    /** @var PingServiceContract|MockObject */
    private $pingService;

    public function construct(): void
    {
        $this->pingService = $this->createMock(PingServiceContract::class);
        $this->service = new IAdminService($this->pingService);
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
