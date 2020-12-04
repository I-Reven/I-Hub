<?php

namespace IRaven\IAdmin\Infra\Http\Controllers;

use IRaven\IAdmin\Domain\Contracts\Services\PingServiceContract;
use IRaven\IAdmin\Infra\Http\Requests\PingRequest;
use IRaven\IAdmin\Domain\Exceptions\PingWriteException;
use Spatie\Multitenancy\Models\Tenant;

/**
 * Class PingController
 * @package IRaven\IAdmin\Infra\Http\Controllers
 */
class PingController extends BaseController
{
    private PingServiceContract $pingService;

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
