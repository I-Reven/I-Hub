<?php

namespace IRaven\Hexagonal\Application\Services;

use IRaven\Hexagonal\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\Hexagonal\Domain\Contracts\Services\PingServiceContract;
use IRaven\Hexagonal\Domain\Models\Ping;
use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;
use IRaven\Hexagonal\Infra\Mail\PingMail;

/**
 * Class PingService
 * @package IRaven\Hexagonal\Application\Services
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
