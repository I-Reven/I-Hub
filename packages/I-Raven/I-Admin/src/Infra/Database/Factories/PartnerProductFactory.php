<?php

namespace IRaven\IAdmin\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IRaven\IAdmin\Domain\Models\Partner;
use IRaven\IAdmin\Domain\Models\PartnerProduct;
use IRaven\IAdmin\Domain\Models\Product;

/**
 * Class PartnerProductFactory
 * @package IRaven\IAdmin\Infra\Database\Factories
 */
class PartnerProductFactory extends Factory
{
    /** @var string */
    protected $model = PartnerProduct::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'partner_id' => Partner::factory(),
            'licence_expire_at' => $this->faker->dateTime,
        ];
    }
}
