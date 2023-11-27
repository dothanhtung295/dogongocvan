<?php

namespace Modules\Contact\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Setting extends Model
{
    use HasFactory;
    protected $table = 'contact_setting';
    public static function getLink($lang = null)
    {
        return Contact_Setting::wherelang($lang ?? \App::getLocale())->wheresetting_key('contact_link')->value('setting_value');
    }
}
