<?php

namespace IRaven\IAdmin\Domain\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use IRaven\IAdmin\Infra\Database\Factories\PingFactory;

/**
 * IRaven\IAdmin\Domain\Models\Ping
 *
 * @property int $id
 * @property string $ip
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|Ping newModelQuery()
 * @method static Builder|Ping newQuery()
 * @method static Builder|Ping query()
 * @method static Builder|Ping whereCreatedAt($value)
 * @method static Builder|Ping whereId($value)
 * @method static Builder|Ping whereIp($value)
 * @method static Builder|Ping whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Ping extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'ip',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return PingFactory
     */
    protected static function newFactory(): PingFactory
    {
        return new PingFactory();
    }
}
