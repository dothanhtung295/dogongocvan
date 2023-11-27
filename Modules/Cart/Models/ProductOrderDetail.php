<?php

namespace Modules\Cart\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrderDetail extends Model
{
    use HasFactory;
    protected $table = 'product_order_detail';
    public $fillable = [
        'order_id',
        'price_buy',
        'quantity',
        'type',
        'type_id',
        'picture',
        'title',
        'option_SKU'
    ];

    protected static function booted()
    {
        static::addGlobalScope('show_default', function(Builder $builder){
            $builder->where('is_show', 1)->where('lang','vi');
        });
    }
}
