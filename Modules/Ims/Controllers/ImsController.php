<?php

namespace Modules\Ims\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Modules\Contact\Models\Contact;
use Modules\Contact\Models\Contact_Setting;
use Modules\Ims\Models\Banner;
use Modules\Ims\Models\Menu;
use Modules\News\Models\News_Group;
use Modules\Page\Models\Page;
use Modules\Page\Models\Page_Group;
use Modules\Product\Models\Product_Group;

class ImsController extends Controller
{
    public function __construct()
    {
        $ims = [];
        // IMS lang
        $ims['global_lang'] = DB::table("global_lang")
            ->where("lang", Config("ims.cur.lang"))
            ->get()->pluck("lang_value", "lang_key");

        // MXH ------------------------------------------------------
        $ims['config_social'] = DB::table("config_social")
            ->where("lang", Config("ims.cur.lang"))
            ->where('is_show', 1)
            ->orderBy("show_order", 'ASC')
            ->orderBy("id", 'ASC')
            ->get();
        // Header ------------------------------------------------------
        $ims['logo'] = Banner::where("lang", Config("ims.cur.lang"))
            ->where("group_name", "logo")
            ->select('id', 'content', 'title')
            ->first();
        $ims['logo_favicon'] = Banner::where("lang", Config("ims.cur.lang"))
            ->where("group_name", "logo-favicon")
            ->select('id', 'content', 'title')
            ->first();
        // Menu ------------------------------------------------------
        $ims['menu'] = Menu::where(['group_id' => 'menu_header', 'parent_id' => 0, 'lang' => Config("ims.cur.lang"), 'is_show' => 1])
            ->orderBy('show_order', 'ASC')
            ->get();

        if (isset($ims['menu'])) {
            foreach ($ims['menu'] as $k => $v) {
                // dd($v);
                if ($v->auto_sub == "group") {
                    // Modules\Plastic\Models\Plastic_Group
                    $name_group                         = "Modules\\" . ucfirst($v->name_action) . "\\Models\\" . ucfirst($v->name_action) . "_Group";
                    // $name_sub                           = "sub" . ucfirst($v->name_action) . "Group";
                    $ims[$v->name_action . '_dropdown'] = $name_group::where('parent_id', 0)->where("is_show", 1)->where("lang", Config("ims.cur.lang"))->orderBy("show_order")->get();
                }
            }
        }
        $ims['menu_footer'] = Menu::where(['group_id' => 'menu_footer', 'parent_id' => 0, 'lang' => Config("ims.cur.lang"), 'is_show' => 1])
            ->select('id', 'name_action', 'title', 'link')
            ->orderBy('show_order')
            ->get();
        $ims['menu_footer1'] = Menu::where(['group_id' => 'menu_footer1', 'parent_id' => 0, 'lang' => Config("ims.cur.lang"), 'is_show' => 1])
            ->select('id', 'name_action', 'title', 'link')
            ->orderBy('show_order')
            ->get();
        $ims['menu_footer2'] = Menu::where(['group_id' => 'menu_footer2', 'parent_id' => 0, 'lang' => Config("ims.cur.lang"), 'is_show' => 1])
            ->select('id', 'name_action', 'title', 'link')
            ->orderBy('show_order')
            ->get();
        // ===================== setting send mail==============================
        $sysoptions = DB::table("sysoptions")->get()->pluck("option_value", "option_key");
        $str = substr($sysoptions['smtp_password'], 20);
        $str = base64_decode($str);
        $sysoptions['smtp_password'] = $str;
        config(['mail.mailers.smtp.password' => $str]);
        config(['mail.mailers.smtp.username' => $sysoptions['smtp_username']]);
        config(['mail.mailers.smtp.port' => $sysoptions['smtp_port']]);
        config(['mail.from.address' => $sysoptions['smtp_username']]);
        config(['mail.from.name' => $sysoptions['smtp_username']]);

        $ims['banner_main'] = Banner::where('is_show', 1)->where("group_name", "banner-main")->where(function ($query) use ($ims) {
            $query->where("show_mod", Config("ims.cur.module"))
                ->where('is_show', 1);
        })->get();
        $ims['banner_menu'] = Banner::where('is_show', 1)->where("group_name", "banner-menu")
                ->where('is_show', 1)->first();
        // dd($ims['banner_main']);
        $ims['contact_footer'] = Banner::where('is_show', 1)
            ->where("group_name", "footer-contact")
            ->first();
        // $ims['banner_footer'] = Banner::where('is_show', 1)
        //     ->where("group_name", "footer-banner")
        //     ->first();

        // Footer ------------------------------------------------------
        $ims['logo_footer'] = Banner::where("group_name", "logo-footer")->where('is_show', 1)->first();
        $ims['map'] = DB::table("contact_setting")->where('is_show', 1)->get()->pluck("setting_value", "setting_key");

        $ims['product_group'] = Product_Group::with('subProductGroup')->where('lang', Config("ims.cur.lang"))->where('is_show', 1)->where('parent_id', 0)->get();

        $ims['banner_register'] = Banner::where("group_name", "form-email-footer")->first();
        $ims['banner-form-email'] = Banner::where("group_name", "banner-form-email")->first();

        $ims['social_network'] = Banner::where("group_name", "social-network")->where('is_show', 1)->orderBy('show_order', 'asc')->orderBy('id', 'asc')->get();


        $ims['group_news'] = News_Group::where('is_show', 1)->get();

        view()->share('ims', $ims);
    }

}
