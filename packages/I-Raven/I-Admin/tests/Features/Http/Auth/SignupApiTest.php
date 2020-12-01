<?php

namespace IRaven\IAdmin\Tests\Features\Http\Auth;

use Illuminate\Http\Response;
use IRaven\IAdmin\Domain\Models\Admin;
use IRaven\IAdmin\Domain\Models\Partner;
use IRaven\IAdmin\Domain\Models\User;
use IRaven\IAdmin\Infra\Database\Factories\UserFactory;
use IRaven\IAdmin\Infra\Http\Resources\UserResource;
use IRaven\IAdmin\Tests\TestCase;

/**
 * Class SignupApiTest
 * @package IRaven\IAdmin\Tests\Features\Http\Auth
 */
class SignupApiTest extends TestCase
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
    public function it_should_signup()
    {
        $user = User::factory()->make();
        $partner = Partner::factory()->create();


        $response = $this->post('i-raven/i-admin/api/v1/auth/signup', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => UserFactory::PASSWORD,
            'partner_slog' => $partner->slog,
        ]);

        $this->assertSame($response->getStatusCode(), Response::HTTP_CREATED);
        $this->assertDatabaseHas('users', ['email' => $user->email, 'name' => $user->name]);
        $this->assertDatabaseHas('admins', ['partner_id' => $partner->id]);
        $this->assertEquals($user->email, $response->getData()->data->email);
        $this->assertEquals($user->rule, Admin::PENDING);
    }

    /**
     * @test
     */
    public function it_should_return_error_when_can_cont_find_partner()
    {
        $user = User::factory()->make();

        $response = $this->post('i-raven/i-admin/api/v1/auth/signup', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => UserFactory::PASSWORD,
            'partner_slog' => $this->faker->word,
        ]);

        $this->assertSame($response->getStatusCode(), Response::HTTP_BAD_REQUEST);
        $this->assertDatabaseMissing('users', ['email' => $user->email, 'name' => $user->name]);
        $this->assertEquals('ERR', $response->getData()->status);
    }
}
