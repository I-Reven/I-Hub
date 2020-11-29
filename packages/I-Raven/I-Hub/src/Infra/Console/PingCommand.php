<?php

namespace IRaven\IHub\Infra\Console;

use IRaven\IHub\Domain\Events\PingEvent;

/**
 * Class PingCommand
 * @package IRaven\IHub\Infra\Console
 */
class PingCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'i-hub:ping {ip}';

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
