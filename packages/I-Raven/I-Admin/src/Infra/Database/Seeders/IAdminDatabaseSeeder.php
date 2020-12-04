<?php

namespace IRaven\IAdmin\Infra\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class IAdminDatabaseSeeder
 * @package IRaven\IAdmin\Infra\Database\Seeders
 */
class IAdminDatabaseSeeder extends Seeder
{
    public static function run()
    {
       PartnerSeeder::run();
    }
}
