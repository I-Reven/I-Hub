<?php

namespace IRaven\IAdmin\Infra\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class BaseMail
 * @package IRaven\IAdmin\Infra\Mail
 */
abstract class BaseMail extends Mailable
{
    use Queueable, SerializesModels;
}
