<?php

namespace IRaven\Hexagonal\Infra\Database\Seeders;

use Illuminate\Database\Seeder;
use IRaven\Hexagonal\Domain\Models\Ping;

/**
 * Class HexagonalDatabaseSeeder
 * @package IRaven\Hexagonal\Infra\Database\Seeders
 */
class HexagonalDatabaseSeeder extends Seeder
{
    public function run()
    {
        Ping::factory(10)->create();
    }
}
