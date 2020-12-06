<?php

namespace IRaven\IAdmin\Infra\Database\Seeders;

use IRaven\IAdmin\Domain\Models\Ping;

/**
 * Class PingSeeder
 * @package IRaven\IAdmin\Infra\Database\Seeders
 */
class PingSeeder
{
    public static function run()
    {
        Ping::factory(1)->create();
    }

}
