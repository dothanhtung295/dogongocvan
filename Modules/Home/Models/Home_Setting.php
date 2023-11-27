<?php

namespace Modules\Home\Models;

use App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Setting extends Model
{
    use HasFactory;
    protected $table = 'home_setting';
    public static function getLink($lang = null)
    {
        return Home_Setting::wherelang($lang ?? App::getLocale())->wheresetting_key('home_link')->value('setting_value');
    }
}
