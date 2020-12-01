<?php

namespace IRaven\IAdmin\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IRaven\IAdmin\Domain\Models\Partner;

/**
 * Class PartnerFactory
 * @package IRaven\IAdmin\Infra\Database\Factories
 */
class PartnerFactory extends Factory
{

    /** @var string */
    protected $model = Partner::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slog' => $this->faker->word,
            'domain' => $this->faker->word,
            'database' => $this->faker->word,
        ];
    }
}
