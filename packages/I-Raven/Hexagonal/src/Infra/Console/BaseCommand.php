<?php

namespace IRaven\Hexagonal\Infra\Console;

use App;
use Illuminate\Console\Command;
use Illuminate\Contracts\Debug\ExceptionHandler;
use IRaven\Hexagonal\Domain\Contracts\Handlers\ExceptionHandlerContract;

/**
 * Class BaseCommand
 * @package IRaven\Hexagonal\Infra\Console
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
