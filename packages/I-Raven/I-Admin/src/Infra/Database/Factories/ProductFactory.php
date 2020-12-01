<?php

namespace IRaven\IAdmin\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IRaven\IAdmin\Domain\Models\Product;

/**
 * Class ProductFactory
 * @package IRaven\IAdmin\Infra\Database\Factories
 */
class ProductFactory extends Factory
{
    /** @var string */
    protected $model = Product::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'prefix' => $this->faker->word,
        ];
    }
}
