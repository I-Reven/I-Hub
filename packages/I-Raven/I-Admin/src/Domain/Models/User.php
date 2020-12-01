<?php

namespace IRaven\IAdmin\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package IRaven\IAdmin\Domain\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /** @var string[] */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** @var string[] */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @var string[] */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
