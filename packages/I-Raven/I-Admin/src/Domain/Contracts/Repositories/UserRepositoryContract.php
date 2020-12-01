<?php

namespace IRaven\IAdmin\Domain\Contracts\Repositories;

use IRaven\IAdmin\Domain\Models\User;

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
}
