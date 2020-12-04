<?php

namespace IRaven\IAdmin\Infra\Database\Seeders;

use DB;

class PartnerSeeder
{
    public static function run(){
        DB::table('partners')->insert([
            'name' => 'tenant',
            'domain' => 'localhost',
            'database' => ':memory:testbench'
        ]);
    }

}
