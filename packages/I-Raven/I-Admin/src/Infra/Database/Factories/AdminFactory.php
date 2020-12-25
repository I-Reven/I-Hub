<?php

namespace IRaven\IAdmin\Infra\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IRaven\IAdmin\Domain\Models\Admin;
use IRaven\IAdmin\Domain\Models\Partner;
use IRaven\IAdmin\Domain\Models\User;

/**
 * Class AdminFactory
 * @package IRaven\IAdmin\Infra\Database\Factories
 */
class AdminFactory extends Factory
{
    /** @var string */
    protected $model = Admin::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'partner_id' => Partner::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'rule' => $this->faker->randomElement(Admin::RULES),
        ];
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function pending(array $attributes): array
    {
        return [
            'rule' => Admin::PENDING
        ];
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function admin(array $attributes): array
    {
        return [
            'rule' => Admin::ADMIN
        ];
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function partnerAdmin(array $attributes): array
    {
        return [
            'rule' => Admin::PARTNER_ADMIN
        ];
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function partnerWriter(array $attributes): array
    {
        return [
            'rule' => Admin::PARTNER_WRITER
        ];
    }

    /**
     * @param array $attributes
     * @return array
     */
    public function partnerReader(array $attributes): array
    {
        return [
            'rule' => Admin::PARTNER_READER
        ];
    }
}
