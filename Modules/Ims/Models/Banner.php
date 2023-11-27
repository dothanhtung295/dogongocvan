<?php

namespace Modules\Ims\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $timestamps = false;

    protected $table = 'banner';

    public static function booted()
    {
        static::addGlobalScope('show_default', function(Builder $builder){
            return $builder->where('lang', Config('ims.cur.lang'))->where('is_show', 1);
        });
    }

    public function bannerGroup()
    {
        return $this->belongsTo(Banner_Group::class, 'group_id');
    }
}
