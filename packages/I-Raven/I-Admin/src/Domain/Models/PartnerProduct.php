<?php

namespace IRaven\IAdmin\Domain\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use IRaven\IAdmin\Infra\Database\Factories\PartnerProductFactory;
use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;

/**
 * Class PartnerProduct
 *
 * @package IRaven\IAdmin\Domain\Models
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerProduct newQuery()
 * @method static Builder|PartnerProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerProduct query()
 * @method static Builder|PartnerProduct withTrashed()
 * @method static Builder|PartnerProduct withoutTrashed()
 * @mixin Eloquent
 */
class PartnerProduct extends Model
{
    use HasFactory, Notifiable, SoftDeletes, UsesLandlordConnection;

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'partner_id',
        'licence_expire_at',
    ];

    /**
     * @return PartnerProductFactory
     */
    public static function newFactory(): PartnerProductFactory
    {
        return new PartnerProductFactory();
    }
}
