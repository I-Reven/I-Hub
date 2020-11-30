<?php

namespace IRaven\Hexagonal\Application\Services;

use IRaven\Hexagonal\Domain\Contracts\Services\HexagonalServiceContract;
use IRaven\Hexagonal\Domain\Contracts\Services\PingServiceContract;
use IRaven\Hexagonal\Domain\Exceptions\PingWriteException;
use IRaven\Hexagonal\Domain\Models\Ping;

/**
 * Class Hexagonal
 * @package IRaven\Hexagonal\Application\RPC
 */
class HexagonalService implements HexagonalServiceContract
{
    private $pingService;

    /**
     * Hexagonal constructor.
     * @param PingServiceContract $pingService
     */
    public function __construct(PingServiceContract $pingService)
    {
        $this->pingService = $pingService;
    }

    /**
     * @param string $ip
     * @return Ping
     * @throws PingWriteException
     */
    public function ping(string $ip): Ping
    {
        return $this->pingService->ping($ip);
    }
}
