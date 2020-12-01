<?php

namespace IRaven\IAdmin\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Admin
 * @package IRaven\IAdmin\Domain\Models
 */
class Admin extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    public const PENDING = 0;
    public const ADMIN = 1;
    public const PARTNER_ADMIN = 2;
    public const PARTNER_WRITER = 3;
    public const PARTNER_READER = 4;

    /** @var int[] */
    public const RULES = [
        self::PENDING,
        self::ADMIN,
        self::PARTNER_ADMIN,
        self::PARTNER_WRITER,
        self::PARTNER_READER,
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'parent_id',
        'user_id',
        'rule',
    ];
}
