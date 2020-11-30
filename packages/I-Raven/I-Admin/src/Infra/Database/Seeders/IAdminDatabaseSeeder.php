<?php

namespace IRaven\IAdmin\Infra\Database\Seeders;

use Illuminate\Database\Seeder;
use IRaven\IAdmin\Domain\Models\Ping;

/**
 * Class IAdminDatabaseSeeder
 * @package IRaven\IAdmin\Infra\Database\Seeders
 */
class IAdminDatabaseSeeder extends Seeder
{
    public function run()
    {
        Ping::factory(10)->create();
    }
}
