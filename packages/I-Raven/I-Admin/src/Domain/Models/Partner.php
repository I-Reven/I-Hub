<?php

namespace IRaven\IAdmin\Domain\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use IRaven\IAdmin\Infra\Database\Factories\PartnerFactory;
use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;
use Spatie\Multitenancy\Models\Tenant;

/**
 * Class Partner
 *
 * @package IRaven\IAdmin\Domain\Models
 * @property int $id
 * @property string $name
 * @property string $prefix
 * @property int $product_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|Partner newModelQuery()
 * @method static Builder|Partner newQuery()
 * @method static \Illuminate\Database\Query\Builder|Partner onlyTrashed()
 * @method static Builder|Partner query()
 * @method static Builder|Partner whereCreatedAt($value)
 * @method static Builder|Partner whereDeletedAt($value)
 * @method static Builder|Partner whereId($value)
 * @method static Builder|Partner whereName($value)
 * @method static Builder|Partner wherePrefix($value)
 * @method static Builder|Partner whereProductId($value)
 * @method static Builder|Partner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Partner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Partner withoutTrashed()
 * @mixin Eloquent
 */
class Partner extends Tenant
{
    use HasFactory, Notifiable, SoftDeletes, UsesLandlordConnection;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'domain',
        'database',
    ];

    /**
     * @return PartnerFactory
     */
    public static function newFactory(): PartnerFactory
    {
        return new PartnerFactory();
    }
}
