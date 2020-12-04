<?php

namespace IRaven\IAdmin\Infra\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\JsonResource;
use IRaven\IAdmin\Domain\Contracts\Services\AuthServiceContract;
use IRaven\IAdmin\Infra\Http\Requests\SignupRequest;
use IRaven\IAdmin\Infra\Http\Resources\ErrorResource;
use IRaven\IAdmin\Infra\Http\Resources\UserResource;
use function PHPUnit\Framework\isInstanceOf;

/**
 * Class AuthController
 * @package IRaven\IAdmin\Infra\Http\Controllers
 */
class AuthController extends BaseController
{
    private AuthServiceContract $authService;

    /**
     * AuthController constructor.
     * @param AuthServiceContract $authService
     */
    public function __construct(AuthServiceContract $authService)
    {
        parent::__construct();
        $this->authService = $authService;
    }

    /**
     * @param SignupRequest $request
     * @return UserResource
     */
    public function signup(SignupRequest $request): JsonResource
    {
        $user = $this->authService->signup($request->email, $request->name, $request->password);
        return new UserResource($user);
    }

}
