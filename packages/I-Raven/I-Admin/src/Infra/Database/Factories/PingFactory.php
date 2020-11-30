<?php

namespace IRaven\IAdmin\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IRaven\IAdmin\Domain\Models\Ping;

/**
 * Class PingFactory
 * @package IRaven\IAdmin\Infra\Database\Factories
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
