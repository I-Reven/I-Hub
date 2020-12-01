<?php

namespace IRaven\IAdmin\Domain\Contracts\Repositories;

use IRaven\IAdmin\Domain\Models\Admin;
use IRaven\IAdmin\Domain\Models\Partner;
use IRaven\IAdmin\Domain\Models\User;

/**
 * Interface AdminRepositoryContract
 * @package IRaven\IAdmin\Domain\Contracts\Repositories
 */
interface AdminRepositoryContract
{
    /**
     * @param User $user
     * @param Partner $partner
     * @return Admin
     */
    public function addUserRule(User $user, Partner $partner): Admin;
}
