<?php

namespace IRaven\IHub\Infra\Http\Controllers;

use IRaven\IHub\Domain\Contracts\Services\PingServiceContract;
use IRaven\IHub\Infra\Http\Requests\PingRequest;
use IRaven\IHub\Domain\Exceptions\PingWriteException;

/**
 * Class PingController
 * @package IRaven\IHub\Infra\Http\Controllers
 */
class PingController extends BaseController
{
    private $pingService;

    /**
     * PingController constructor.
     * @param PingServiceContract $pingService
     */
    public function __construct(PingServiceContract $pingService)
    {
        parent::__construct();
        $this->pingService = $pingService;
    }

    /**
     * @param PingRequest $pingRequest
     * @return string
     * @throws PingWriteException
     */
    public function ping(PingRequest $pingRequest): string
    {
        $this->pingService->ping($pingRequest->getClientIp());

        return 'Pong';
    }
}
