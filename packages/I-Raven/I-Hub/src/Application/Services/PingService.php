<?php

namespace IRaven\IHub\Application\Services;

use IRaven\IHub\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\IHub\Domain\Contracts\Services\PingServiceContract;
use IRaven\IHub\Domain\Models\Ping;
use IRaven\IHub\Domain\Exceptions\PingWriteException;
use IRaven\IHub\Infra\Mail\PingMail;

/**
 * Class PingService
 * @package IRaven\IHub\Application\Services
 */
class PingService implements PingServiceContract
{
    private $pingRepository;

    /**
     * PingService constructor.
     * @param PingRepositoryContract $pingRepository
     */
    public function __construct(PingRepositoryContract $pingRepository)
    {
        $this->pingRepository = $pingRepository;
    }

    /**
     * @param string $ip
     * @return Ping
     * @throws PingWriteException
     */
    public function ping(string $ip): Ping
    {
        return $this->pingRepository->pingIp($ip);
    }
}
