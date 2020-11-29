<?php

namespace IRaven\IHub\Tests\Features\Http;

use Illuminate\Http\Response;
use IRaven\IHub\Tests\FeatureTestCase;

/**
 * Class PingTest
 * @package IRaven\IHub\Tests\Features
 */
class PingHttpTest extends FeatureTestCase
{
    /**
     * @test
     */
    public function it_should_return_pong()
    {
        $response = $this->get('/i-raven/i-hub/api/v1/ping');
        $this->assertSame($response->getStatusCode(), Response::HTTP_OK);
        $this->assertSame($response->content(), 'Pong');
        $this->assertDatabaseHas('pings', ['ip' => '127.0.0.1']);
    }
}
