<?php

namespace Modules\Posts\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts_Setting extends Model
{
    use HasFactory;
    protected $table = 'posts_setting';

    protected static function booted()
    {
        static::addGlobalScope('show_lang_default', function (Builder $builderp) {
            $builderp->where('is_show', 1);
        });
    }
    public static function getLink($friendly_link, $lang)
    {
        return Posts_Setting::wherelang($lang)->wheresetting_key($friendly_link)->value('setting_value');
    }
}
