<?php

namespace IRaven\IAdmin\Application\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use IRaven\IAdmin\Domain\Contracts\Repositories\AdminRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\PartnerRepositoryContract;
use IRaven\IAdmin\Domain\Contracts\Services\AuthServiceContract;
use IRaven\IAdmin\Domain\Contracts\Repositories\UserRepositoryContract;
use IRaven\IAdmin\Domain\Models\User;

class AuthService implements AuthServiceContract
{
    private $userRepository;
    private $adminRepository;
    private $partnerRepository;

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
     * @param string $partnerSlog
     * @throws ModelNotFoundException
     * @return User
     */
    public function signup(string $email, string $name, string $password, string $partnerSlog): User
    {
        $partner = $this->partnerRepository->getPartnerBySlog($partnerSlog);
        $user = $this->userRepository->createUser($email, $name, $password);
        $this->adminRepository->addUserRule($user,$partner);


        return $user;
    }
}
