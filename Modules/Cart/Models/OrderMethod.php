<?php

namespace Modules\Cart\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMethod extends Model
{
    use HasFactory;
    protected $table = 'order_method';
    protected static function booted()
    {
        static::addGlobalScope('show_default', function(Builder $builder){
            $builder->where('is_show', 1)->where('lang','vi');
        });
    }
}
