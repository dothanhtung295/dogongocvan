<?php

namespace Modules\About\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_Setting extends Model {
    use HasFactory;
    protected $table = 'about_setting';

    protected static function booted() {
        static::addGlobalScope('show_lang_default', function (Builder $builder) {
            $builder->where('is_show', 1);
        });
    }
    public static function getLink($lang = null) {
        return About_Setting::wherelang($lang ?? app()->getLocale())->wheresetting_key('about_link')->value('setting_value');
    }
}
