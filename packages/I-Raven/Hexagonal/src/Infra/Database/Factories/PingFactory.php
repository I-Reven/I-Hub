<?php

namespace IRaven\Hexagonal\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IRaven\Hexagonal\Domain\Models\Ping;

/**
 * Class PingFactory
 * @package IRaven\Hexagonal\Infra\Database\Factories
 */
class PingFactory extends Factory
{

    protected $model = Ping::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'ip' => $this->faker->ipv4,
        ];
    }
}
