<?php

namespace IRaven\IAdmin\Domain\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use IRaven\IAdmin\Infra\Database\Factories\AdminFactory;
use IRaven\IAdmin\Infra\Database\Factories\UserFactory;
use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;

/**
 * Class Admin
 *
 * @package IRaven\IAdmin\Domain\Models
 * @property int $id
 * @property int $rule
 * @property int $user_id
 * @property int $partner_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|Admin newModelQuery()
 * @method static Builder|Admin newQuery()
 * @method static \Illuminate\Database\Query\Builder|Admin onlyTrashed()
 * @method static Builder|Admin query()
 * @method static Builder|Admin whereCreatedAt($value)
 * @method static Builder|Admin whereDeletedAt($value)
 * @method static Builder|Admin whereId($value)
 * @method static Builder|Admin wherePartnerId($value)
 * @method static Builder|Admin whereRule($value)
 * @method static Builder|Admin whereUpdatedAt($value)
 * @method static Builder|Admin whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Admin withoutTrashed()
 * @mixin Eloquent
 */
class Admin extends Model
{
    use HasFactory, Notifiable, SoftDeletes, UsesLandlordConnection;

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
        'user_id',
        'partner_id',
        'rule',
    ];

    /**
     * @return AdminFactory
     */
    public static function newFactory(): AdminFactory
    {
        return new AdminFactory();
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
