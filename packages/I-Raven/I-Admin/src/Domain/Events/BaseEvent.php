<?php

namespace IRaven\IAdmin\Domain\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class BaseEvent
 * @package IRaven\IAdmin\Domain\Events
 */
abstract class BaseEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
