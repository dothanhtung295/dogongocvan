<?php

namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_Setting extends Model
{
    use HasFactory;
    protected $table = 'service_setting';
    public static function getLink($friendly_link, $lang)
    {
        return Service_Setting::wherelang($lang)->wheresetting_key($friendly_link)->value('setting_value');
    }
}
