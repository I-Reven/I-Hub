<?php

namespace IRaven\IAdmin\Tests\Features\Http\Auth;

use Illuminate\Http\Response;
use IRaven\IAdmin\Domain\Models\Admin;
use IRaven\IAdmin\Domain\Models\Partner;
use IRaven\IAdmin\Infra\Database\Factories\UserFactory;
use IRaven\IAdmin\Tests\TestCase;

class LoginTest extends TestCase
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
    public function it_should_return_user_when_login()
    {
        $admin = Admin::factory()->create(['partner_id' => Partner::first()->id]);

        $response = $this->postJson('i-raven/i-admin/api/v1/auth/login', [
            'email' => $admin->user->email,
            'password' =>UserFactory::PASSWORD,
            'remember_me' => $this->faker->boolean
        ]);

        dd($response);

        $this->assertSame($response->getStatusCode(), Response::HTTP_OK);
        $this->assertEquals($admin->user->email, $response->getData()->data->email);
        $this->assertEquals($admin->rule, $response->getData()->data->rule);

    }
}
