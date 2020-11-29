<?php

namespace IRaven\IHub\Domain\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class BaseEvent
 * @package IRaven\IHub\Domain\Events
 */
abstract class BaseEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
