<?php

namespace IRaven\IAdmin\Application\Services;

use IRaven\IAdmin\Domain\Contracts\Repositories\AdminRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\PartnerRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Services\AuthServiceContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\UserRepositoryContract;
use IRaven\IAdmin\Domain\Models\User;
use Laravel\Passport\PersonalAccessTokenResult;

class AuthService implements AuthServiceContract
{
    private UserRepositoryContract $userRepository;
    private AdminRepositoryContract $adminRepository;
    private PartnerRepositoryContract $partnerRepository;

    /**
     * AuthService constructor.
     * @param UserRepositoryContract $userRepository
     * @param AdminRepositoryContract $adminRepository
     * @param PartnerRepositoryContract $partnerRepository
     */
    public function __construct(
        UserRepositoryContract $userRepository,
        AdminRepositoryContract $adminRepository,
        PartnerRepositoryContract $partnerRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->adminRepository = $adminRepository;
        $this->partnerRepository = $partnerRepository;
    }

    /**
     * @param string $email
     * @param string $name
     * @param string $password
     * @return User
     */
    public function signup(string $email, string $name, string $password): User
    {
        $partner = app('partner');
        $user = $this->userRepository->createUser($email, $name, $password);
        $this->adminRepository->addUserRule($user, $partner);

        return $user;
    }

    /**
     * @param string $email
     * @param string $password
     * @param bool $rememberMe
     * @return PersonalAccessTokenResult
     */
    public function login(string $email, string $password, bool $rememberMe): PersonalAccessTokenResult
    {
        $user = $this->userRepository->getUserByEmailAndPassword($email, $password);
        return $this->userRepository->getToken($user, $rememberMe);
    }
}
