<?php

namespace IRaven\IAdmin\Infra\Repositories;

use IRaven\IAdmin\Domain\Contracts\Repositories\UserRepositoryContract;
use IRaven\IAdmin\Domain\Models\User;

/**
 * Class UserRepository
 * @package IRaven\IAdmin\Infra\Repositories
 */
class UserRepository implements UserRepositoryContract
{

    /**
     * @param string $email
     * @param string $name
     * @param string $password
     * @return User
     */
    public function createUser(string $email, string $name, string $password): User
    {
        $user = new User([
            'email' => $email,
            'name' => $name,
            'password' => bcrypt($password),
        ]);
        $user->save();

        return $user;
    }
}
