<?php

namespace Modules\Contact\Controllers;

use Exception;
use Illuminate\Http\Request;
use Modules\Ims\Controllers\ImsController;
use Modules\Contact\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Modules\Ims\Models\Banner;

class ContactController extends ImsController
{
    public function Contact()
    {
        $data['setting'] = setting('contact_setting');

        $data['global_lang'] = DB::table('global_lang')
            ->where('lang', Config('ims.cur.lang'))
            ->get()
            ->pluck('lang_value', 'lang_key');

        $data['contact_setting'] = DB::table("contact_setting")
            ->where("lang", Config("ims.cur.lang"))
            ->pluck('setting_value', 'setting_key');
        $data['contact_lang'] = DB::table("contact_lang")
            ->where("lang", Config("ims.cur.lang"))
            ->pluck('lang_value', 'lang_key');

        $data['banner_contact'] = Banner::where(['is_show' => 1, 'group_name' => "banner-page-contact"])->firstOrFail();
        return view('Contact::Contact', ['contact' => $data]);
    }


    public function form(Request $request)
    {

        if (empty($request->all())) {
            return response()->json([
                'errors' => true,
                'msg' => 'Dữ liệu gửi đi không hợp lệ.'
            ], 200);
        }
        try {
            Contact::create([
                'full_name' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'is_show' => 0,
                'content' => $request->content,
                'type' => 'contact',
                'date_create' => time(),
                'date_update' => time()
            ]);
            return response()->json([
                'errors' => false,
                'msg' => 'Đã gửi thành công.'
            ], 200);
        } catch (Exception $e) {
            Log::error("Error submit form contact: " . $e->getMessage());
            return response()->json([
                'errors' => true,
                'msg' => 'Đã có lỗi xảy ra.'
            ], 200);
        }
    }


    public function register(Request $request)
    {
        if (empty($request->all())) {
            return response()->json([
                'errors' => true,
                'msg' => 'Dữ liệu gửi đi không hợp lệ.'
            ], 200);
        }
        try {
            Contact::create([
                'email' => $request->email,
                'is_show' => 0,
                'style' => 2,
                'content' => 'Đăng Ký Nhận Ưu Đãi',
                'date_create' => time(),
                'date_update' => time()
            ]);
            return response()->json([
                'errors' => false,
                'msg' => 'Đã gửi thành công.'
            ], 200);
        } catch (Exception $e) {
            Log::error("Error submit form contact: " . $e->getMessage());
            return response()->json([
                'errors' => true,
                'msg' => 'Đã có lỗi xảy ra.'
            ], 200);
        }
    }
}
