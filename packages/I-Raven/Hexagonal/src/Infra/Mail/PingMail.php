<?php

namespace IRaven\Hexagonal\Infra\Mail;

use IRaven\Hexagonal\Domain\Models\Ping;

/**
 * Class PingMail
 * @package IRaven\Hexagonal\Infra\Mail
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
        return $this->view('i-raven.hexagonal.email.ping');
    }
}
