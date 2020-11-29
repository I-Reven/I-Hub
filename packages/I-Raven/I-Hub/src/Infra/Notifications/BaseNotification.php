<?php

namespace IRaven\IHub\Infra\Notifications;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;

/**
 * Class BaseNotification
 * @package IRaven\IHub\Infra\Notifications
 */
abstract class BaseNotification extends Notification implements ShouldQueue
{
    use Queueable;
}
