<?php

namespace Modules;

use App;
use Config;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Modules\Ims\Models\Friendly_Link;
use Route;
use Str;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //Set config('ims')
        // DB::enableQueryLog();
        $sysoptions = DB::table('sysoptions')->get()->pluck('option_value', 'option_key')->toArray();
        Config::set('ims.conf', $sysoptions);
        $lang_all     = DB::table('lang')->where('is_show', 1)->get()->keyBy('name');
        $lang_default = $lang_all->where('is_show', 1)->first()->name;
        //Get ims_cur from Friendly_Link
        $ims_cur = Friendly_Link::where('friendly_link', Str::afterLast(Request()->path(), '/'))->first();
        //Get ims_cur if Friendly_Link is null
        $ims_cur ??= Friendly_Link::where([
            'module' => 'home',
            'action' => 'home',
            'lang' => $lang_default
        ])->first();
        //Get ims_lang # ims_cur (en, cn, ...)


        $ims_lang = Friendly_Link::where([
            'dbtable' => $ims_cur->dbtable,
            'dbtable_id' => $ims_cur->dbtable_id
        ])->get()->keyBy('lang');
        foreach ($lang_all as $l) {
            if ($l->name === $ims_cur->lang) {
                App::setLocale($ims_cur->lang);
                Config::set('ims.cur', $ims_lang[$ims_cur->lang]->toArray());
                Config::set('ims.cur.lang_title', $l->title);
                if ($ims_cur->action == 'group' || $ims_cur->action == 'detail') {
                    $class = "Modules\\" . ucfirst($ims_cur->module) . "\\Models\\" . ucwords($ims_cur->dbtable, '_');
                    $cur   = $class::withoutGlobalScopes()
                        ->where([
                            ($ims_cur->action == 'detail' ? 'item' : $ims_cur->action) . "_id" => $ims_cur->dbtable_id,
                            "lang" => $ims_cur->lang,
                            "is_show" => 1,
                        ])->first();
                    Config::set('ims.cur', array_merge(Config('ims.cur'), $cur->toArray()));
                } else {
                    $class = "Modules\\" . ucfirst($ims_cur->module) . "\\Models\\" . ucwords($ims_cur->dbtable, '_');
                    $cur   = $class::withoutGlobalScopes()
                        ->where([
                            "lang" => $ims_cur->lang,
                            "is_show" => 1,
                        ])->pluck("setting_value", "setting_key");
                    $cur   = $cur->mapWithKeys(function ($value, $key) use ($ims_cur) {
                        $newKey = str_replace($ims_cur->module . '_', '', $key);
                        return [$newKey => $value];
                    });
                    Config::set('ims.cur', array_merge(Config('ims.cur'), $cur->toArray()));
                }
            } else {
                Config::set('ims.lang.' . $l->name, $ims_lang[$l->name]->toArray());
                Config::set('ims.lang.' . $l->name . '.lang_title', $l->title);
                Config::set('ims.lang.' . $l->name . '.lang_link', $ims_lang[$l->name]->get_link_lang());
            }
        }



        // foreach ($ims_lang as $r) {
        //     if ($r == $ims_cur) {
        //         App::setLocale($r->lang);
        //         Config::set('ims.cur', $r->toArray());
        //         Config::set('ims.cur.lang_title', $lang_all[$r->lang]->title);
        //     } else {
        //         Config::set('ims.lang.' . $r->lang, $r->toArray());
        //         Config::set('ims.lang.' . $r->lang . '.lang_title', $lang_all[$r->lang]->title);
        //         Config::set('ims.lang.' . $r->lang . '.lang_link', $r->get_link_lang());
        //     }
        // }
        // dd(DB::getQueryLog());

        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            // Khai báo route
            if (File::exists(__DIR__ . '/' . $module . '/Routes/web.php')) {
                Route::group(['middleware' => 'web', 'namespace' => 'Modules\\' . $module], function () use ($module) {
                    $this->loadRoutesFrom(__DIR__ . '/' . $module . '/Routes/web.php');
                });
            }
            // Khai báo migration
            if (File::exists(__DIR__ . '/' . $module . "/Database/Migrations")) {
                $this->loadMigrationsFrom(__DIR__ . '/' . $module . "/Database/Migrations");
            }
            // Khai báo View
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }
        }
    }
    public function register()
    {

    }
}
