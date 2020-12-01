<?php

namespace IRaven\IAdmin\Domain\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use IRaven\IAdmin\Infra\Database\Factories\FeatureFactory;

/**
 * Class Feature
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
 * @method static Builder|Feature newModelQuery()
 * @method static Builder|Feature newQuery()
 * @method static \Illuminate\Database\Query\Builder|Feature onlyTrashed()
 * @method static Builder|Feature query()
 * @method static Builder|Feature whereCreatedAt($value)
 * @method static Builder|Feature whereDeletedAt($value)
 * @method static Builder|Feature whereId($value)
 * @method static Builder|Feature whereName($value)
 * @method static Builder|Feature wherePrefix($value)
 * @method static Builder|Feature whereProductId($value)
 * @method static Builder|Feature whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Feature withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Feature withoutTrashed()
 * @mixin Eloquent
 */
class Feature extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'prefix',
        'product_id',
    ];

    /**
     * @return FeatureFactory
     */
    public static function newFactory(): FeatureFactory
    {
        return new FeatureFactory();
    }
}
