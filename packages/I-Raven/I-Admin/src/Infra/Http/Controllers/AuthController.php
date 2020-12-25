<?php

namespace IRaven\IAdmin\Infra\Http\Controllers;

use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\JsonResource;
use IRaven\IAdmin\Domain\Contracts\Services\AuthServiceContract;
use IRaven\IAdmin\Infra\Http\Requests\LoginRequest;
use IRaven\IAdmin\Infra\Http\Requests\SignupRequest;
use IRaven\IAdmin\Infra\Http\Resources\ErrorResource;
use IRaven\IAdmin\Infra\Http\Resources\PersonalAccessTokenResource;
use IRaven\IAdmin\Infra\Http\Resources\UserResource;
use Laravel\Passport\PersonalAccessTokenResult;
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

    /**
     * @param LoginRequest $request
     * @return JsonResource
     */
    public function login(LoginRequest $request): JsonResource
    {
        $personalAccessToken = $this->authService->login($request->email, $request->password, $request->remember_me);
        return new PersonalAccessTokenResource($personalAccessToken);
    }
}
