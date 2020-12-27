<?php

namespace IRaven\IAdmin\Infra\Repositories;

use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use IRaven\IAdmin\Domain\Contracts\Repositories\UserRepositoryContract;
use IRaven\IAdmin\Domain\Models\User;
use Laravel\Passport\PersonalAccessTokenResult;

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
            'password' => Hash::make($password),
        ]);

        $user->save();

        return $user;
    }

    /**
     * @param $email
     * @param $password
     * @return User
     * @throws ModelNotFoundException
     */
    public function getUserByEmailAndPassword(string $email, string $password): User
    {
        $user = User::where(['email' => $email])->firstOrFail();
        if (!Hash::check($password, $user->password)) {
            throw (new ModelNotFoundException())->setModel('user', $user->id);
        }

        return $user;
    }

    /**
     * @param User $user
     * @param bool $rememberMe
     * @return PersonalAccessTokenResult
     */
    public function getToken(User $user, bool $rememberMe): PersonalAccessTokenResult
    {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($rememberMe) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();
        return $tokenResult;
    }
}
