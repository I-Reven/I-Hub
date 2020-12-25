<?php

namespace IRaven\IAdmin\Domain\Contracts\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use IRaven\IAdmin\Domain\Models\User;
use Laravel\Passport\PersonalAccessTokenResult;

/**
 * Interface UserRepositoryContract
 * @package IRaven\IAdmin\Domain\Contracts\Repositories
 */
interface UserRepositoryContract
{
    /**
     * @param string $email
     * @param string $name
     * @param string $password
     * @return User
     */
    public function createUser(string $email, string $name, string $password): User;

    /**
     * @param string $email
     * @param string $password
     * @return User
     * @throws ModelNotFoundException
     */
    public function getUserByEmailAndPassword(string $email, string $password): User;

    /**
     * @param User $user
     * @param bool $rememberMe
     * @return PersonalAccessTokenResult
     */
    public function getToken(User $user, bool $rememberMe): PersonalAccessTokenResult;
}
