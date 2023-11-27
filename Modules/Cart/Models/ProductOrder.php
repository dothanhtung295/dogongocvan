<?php

namespace Modules\Cart\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;
    protected $table = 'product_order';
    public $fillable =
    [
        'o_full_name',
        'o_email',
        'o_phone',
        'o_district',
        'o_province',
        'o_address',
        'o_note',
        'd_province',
        'd_district',
        'd_full_name',
        'd_email',
        'd_phone',
        'd_address',
        'shipping',
        'method',
        'total_order',
        'shipping_price',
        'method_price',
        'total_payment',
        'user_id'
    ];
    protected static function booted()
    {
        static::addGlobalScope('show_default', function(Builder $builder){
            $builder->where('is_show', 1)->where('lang','vi');
        });
    }
}
