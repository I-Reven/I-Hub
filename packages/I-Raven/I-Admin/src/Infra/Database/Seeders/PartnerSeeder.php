<?php

namespace IRaven\IAdmin\Infra\Database\Seeders;

use DB;

/**
 * Class PartnerSeeder
 * @package IRaven\IAdmin\Infra\Database\Seeders
 */
class PartnerSeeder
{
    public static function run(){
        DB::table('partners')->insert([
            'name' => 'tenant',
            'domain' => 'localhost',
            'database' => 'testing'
        ]);
    }

}
