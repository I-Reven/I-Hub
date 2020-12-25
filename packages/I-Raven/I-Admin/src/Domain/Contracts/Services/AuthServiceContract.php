<?php

namespace IRaven\IAdmin\Domain\Contracts\Services;

use IRaven\IAdmin\Domain\Models\User;
use Laravel\Passport\PersonalAccessTokenResult;

/**
 * Interface AuthServiceContract
 * @package IRaven\IAdmin\Domain\Contracts\Services
 */
interface AuthServiceContract
{
    /**
     * @param string $email
     * @param string $name
     * @param string $password
     * @return User
     */
    public function signup(string $email, string $name, string $password): User;

    /**
     * @param string $email
     * @param string $password
     * @param bool $rememberMe
     * @return PersonalAccessTokenResult
     */
    public function login(string $email, string $password, bool $rememberMe): PersonalAccessTokenResult;

}
