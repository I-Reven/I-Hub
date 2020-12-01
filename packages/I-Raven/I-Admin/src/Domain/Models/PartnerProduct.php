<?php

namespace IRaven\IAdmin\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class PartnerProduct
 * @package IRaven\IAdmin\Domain\Models
 */
class PartnerProduct extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'partner_id',
        'licence_expire_at',
    ];
}
