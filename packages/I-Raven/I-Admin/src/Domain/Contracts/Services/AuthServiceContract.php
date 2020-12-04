<?php

namespace IRaven\IAdmin\Domain\Contracts\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use IRaven\IAdmin\Domain\Models\User;

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

}
