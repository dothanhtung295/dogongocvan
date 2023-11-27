<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Setting extends Model
{
    use HasFactory;
    protected $table = 'product_setting';

    protected static function bootedpr()
    {
        static::addGlobalScopepr('show_lang_default', function (Builder $builderpr) {
            $builderpr->where('is_show', 1);
        });
    }
    public static function getLink($lang = null)
    {
        return Product_Setting::wherelang($lang ?? \App::getLocale())->wheresetting_key('product_link')->value('setting_value');
    }
}
