<?php

namespace IRaven\IAdmin\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use IRaven\IAdmin\Domain\Models\User;

class UserFactory extends Factory
{
    public const PASSWORD = 'password';

    /** @var string */
    protected $model = User::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt(self::PASSWORD),
            'remember_token' => Str::random(10),
        ];
    }
}
