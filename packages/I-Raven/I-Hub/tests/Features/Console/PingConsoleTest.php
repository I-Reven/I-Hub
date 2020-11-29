<?php

namespace IRaven\IHub\Tests\Features\Console;

use IRaven\IHub\Tests\FeatureTestCase;
use TiMacDonald\Log\LogFake;
use Illuminate\Support\Facades\Log;

/**
 * Class PingConsoleTest
 * @package IRaven\IHub\Tests\Features\Console
 */
class PingConsoleTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function it_should_ping_ip()
    {
        $logs = [
            'Subscribe Ping Event IP: 192.168.1.1',
        ];

        Log::swap(new LogFake);

        $this->artisan('i-hub:ping', ['ip' => '192.168.1.1']);

        $this->assertDatabaseHas('pings', ['ip' => '192.168.1.1']);
        Log::assertLogged('info', function ($message, $context) use ($logs) {
            return in_array($message, $logs);
        });
    }
}
