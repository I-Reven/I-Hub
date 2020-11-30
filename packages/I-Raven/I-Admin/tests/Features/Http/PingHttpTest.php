<?php

namespace IRaven\IAdmin\Tests\Features\Http;

use Illuminate\Http\Response;
use IRaven\IAdmin\Tests\TestCase;

/**
 * Class PingTest
 * @package IRaven\IAdmin\Tests\Features
 */
class PingHttpTest extends TestCase
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
    public function it_should_return_pong()
    {
        $response = $this->get('/i-raven/i-admin/api/v1/ping');

        $this->assertSame($response->getStatusCode(), Response::HTTP_OK);
        $this->assertSame($response->content(), 'Pong');
        $this->assertDatabaseHas('pings', ['ip' => '127.0.0.1']);
    }
}
