<?php

namespace IRaven\IAdmin\Application\Policies;

use IRaven\IAdmin\Domain\Models\Admin;
use IRaven\IAdmin\Domain\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function update(User $user, Admin $admin): bool
    {
        return $user->id === $admin->user_id;
    }
}
