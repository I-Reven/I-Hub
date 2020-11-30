<?php

namespace IRaven\Hexagonal\Infra\Console;

use IRaven\Hexagonal\Domain\Events\PingEvent;

/**
 * Class PingCommand
 * @package IRaven\Hexagonal\Infra\Console
 */
class PingCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hexagonal:ping {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

    public function handle()
    {
        PingEvent::dispatch($this->argument('ip'));
    }
}
