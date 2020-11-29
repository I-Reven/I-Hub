<?php

namespace IRaven\IHub\Infra\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class BaseMail
 * @package IRaven\IHub\Infra\Mail
 */
abstract class BaseMail extends Mailable
{
    use Queueable, SerializesModels;
}
