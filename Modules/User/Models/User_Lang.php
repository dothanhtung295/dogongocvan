<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Lang extends Model
{
    use HasFactory;
    protected $table = 'user_lang';

    protected static function booted()
    {
        static::addGlobalScope('show_lang_default', function (Builder $builder) {
            $builder->where('is_show', 1)->where('lang', Config('ims.cur.lang'));
        });
    }
    public static function getLink($friendly_link, $lang)
    {
        return User_Setting::whereLang($lang)->wheresetting_key($friendly_link)->value('setting_value');
    }
}
