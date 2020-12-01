<?php

namespace IRaven\IAdmin\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IRaven\IAdmin\Domain\Models\Feature;
use IRaven\IAdmin\Domain\Models\Partner;

/**
 * Class FeatureFactory
 * @package IRaven\IAdmin\Infra\Database\Factories
 */
class FeatureFactory extends Factory
{
    /** @var string */
    protected $model = Feature::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'prefix' => $this->faker->word,
            'product_id' => Partner::factory(),
        ];
    }
}
