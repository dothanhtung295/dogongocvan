<?php

namespace Modules\News\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class News_Setting extends Model
{
    use HasFactory;
    protected $table = 'news_setting';

    protected static function bootedp()
    {
        static::addGlobalScopep('show_lang_default', function (Builder $builderp) {
            $builderp->where('is_show', 1);
        });
    }
    public static function getLink($lang = null)
    {
        return News_Setting::wherelang($lang ?? App::getLocale())->wheresetting_key('news_link')->value('setting_value');
    }
}