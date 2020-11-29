<?php

namespace IRaven\IHub\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IRaven\IHub\Domain\Models\Ping;

/**
 * Class PingFactory
 * @package IRaven\IHub\Infra\Database\Factories
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
