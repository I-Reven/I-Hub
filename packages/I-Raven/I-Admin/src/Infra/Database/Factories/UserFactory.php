<?php

namespace IRaven\IAdmin\Infra\Database\Factories;

use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use IRaven\IAdmin\Domain\Models\User;

/**
 * Class UserFactory
 * @package IRaven\IAdmin\Infra\Database\Factories
 */
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
            'password' => Hash::make(self::PASSWORD),
            'remember_token' => Str::random(10),
        ];
    }
}
