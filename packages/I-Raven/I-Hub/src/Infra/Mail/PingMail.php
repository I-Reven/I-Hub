<?php

namespace IRaven\IHub\Infra\Mail;

use IRaven\IHub\Domain\Models\Ping;

/**
 * Class PingMail
 * @package IRaven\IHub\Infra\Mail
 */
class PingMail extends BaseMail
{
    protected $ping;

    /**
     * PingMail constructor.
     * @param Ping $ping
     */
    public function __construct(Ping $ping)
    {
        $this->ping = $ping;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): PingMail
    {
        return $this->view('i-raven.i-hub.email.ping');
    }
}
