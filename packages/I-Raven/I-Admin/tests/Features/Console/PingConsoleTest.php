<?php

namespace IRaven\IAdmin\Tests\Features\Console;

use IRaven\IAdmin\Tests\TestCase;
use TiMacDonald\Log\LogFake;
use Illuminate\Support\Facades\Log;

/**
 * Class PingConsoleTest
 * @package IRaven\IAdmin\Tests\Features\Console
 */
class PingConsoleTest extends TestCase
{
    public function construct(): void
    {
        // TODO: Implement construct() method.
    }

    public function destruct(): void
    {
        // TODO: Implement destruct() method.
    }

    /**
     * @test
     */
    public function it_should_ping_ip()
    {
        $ip = $this->faker->ipv4;
        $logs = [
            'Subscribe Ping Event IP: '. $ip,
        ];

        Log::swap(new LogFake);

        $this->artisan('i-admin:ping', ['ip' => $ip]);

        $this->assertDatabaseHas('pings', ['ip' => $ip], 'partner');

        Log::assertLogged('info', function ($message, $context) use ($logs) {
            return in_array($message, $logs);
        });
    }
}
