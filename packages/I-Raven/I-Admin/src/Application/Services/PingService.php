<?php

namespace IRaven\IAdmin\Application\Services;

use IRaven\IAdmin\Domain\Contracts\Repositories\PingRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Services\PingServiceContract;
use IRaven\IAdmin\Domain\Models\Ping;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;
use IRaven\IAdmin\Infra\Mail\PingMail;

/**
 * Class PingService
 * @package IRaven\IAdmin\Application\Services
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
