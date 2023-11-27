<?php

namespace Modules\Ims\Models;

use Illuminate\Database\Eloquent\Model;

class Banner_Group extends Model
{

    public $timestamps = false;

    protected $table = 'banner_group';

    protected $fillable = [
        'group_id',
        'arr_title',
        'width',
        'height',
        'type_show',
        'show_order',
        'is_show',
        'created_at',
        'updated_at'
    ];

    public function banner()
    {
        return $this->hasMany(Banner::class, 'group_id', 'group_id')->where([
            'lang'          => Config("ims.cur.lang"),
            'is_show'       => 1,
        ])->orderBy('show_order', 'asc');
    }
}
