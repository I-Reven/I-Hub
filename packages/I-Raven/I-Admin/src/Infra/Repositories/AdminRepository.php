<?php

namespace IRaven\IAdmin\Infra\Repositories;

use IRaven\IAdmin\Domain\Contracts\Repositories\AdminRepositoryContract;
use IRaven\IAdmin\Domain\Models\Admin;
use IRaven\IAdmin\Domain\Models\Partner;
use IRaven\IAdmin\Domain\Models\User;

/**
 * Class AdminRepository
 * @package IRaven\IAdmin\Infra\Repositories
 */
class AdminRepository implements AdminRepositoryContract
{

    /**
     * @param User $user
     * @param Partner $partner
     * @return Admin
     */
    public function addUserRule(User $user, Partner $partner): Admin
    {
        $admin = new Admin([
            'user_id' => $user->id,
            'partner_id' => $partner->id,
            'rule' => Admin::PENDING
        ]);
        $admin->save();

        return $admin;
    }
}
