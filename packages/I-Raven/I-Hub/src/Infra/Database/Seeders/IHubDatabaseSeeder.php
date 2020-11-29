<?php

namespace IRaven\IHub\Infra\Database\Seeders;

use Illuminate\Database\Seeder;
use IRaven\IHub\Domain\Models\Ping;

/**
 * Class IHubDatabaseSeeder
 * @package IRaven\IHub\Infra\Database\Seeders
 */
class IHubDatabaseSeeder extends Seeder
{
    public function run()
    {
        Ping::factory(1000)->create();
    }
}
