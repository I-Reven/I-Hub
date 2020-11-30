<?php

namespace IRaven\IAdmin\Infra\Console;

use App;
use Illuminate\Console\Command;
use Illuminate\Contracts\Debug\ExceptionHandler;
use IRaven\IAdmin\Domain\Contracts\Handlers\ExceptionHandlerContract;

/**
 * Class BaseCommand
 * @package IRaven\IAdmin\Infra\Console
 */
abstract class BaseCommand extends Command
{

    /**
     * PingCommand constructor.
     */
    public function __construct()
    {
        App::singleton(
            ExceptionHandler::class,
            ExceptionHandlerContract::class
        );

        parent::__construct();
    }
}
