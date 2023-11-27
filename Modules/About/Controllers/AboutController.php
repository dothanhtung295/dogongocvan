<?php

namespace Modules\About\Controllers;

use Modules\About\Models\About;
use Modules\Ims\Controllers\ImsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Modules\Ims\Models\Banner;


class AboutController extends ImsController
{
    public function About()
    {
        $data['setting'] = DB::table("about_setting")->where("lang", Config("ims.cur.lang"))->get();
        $data['setting'] = Arr::pluck($data['setting'], "setting_value", "setting_key");

        $data['about_lang'] = DB::table("about_lang")
            ->where("lang", Config("ims.cur.lang"))
            ->get()->pluck("lang_value", "lang_key");

        $data['about'] = About::where("lang", Config("ims.cur.lang"))->where('is_show', 1)->first();
        if (!empty( $data['about'])) {
            $data['about']->arr_custom = unserialize( $data['about']->arr_custom);
        }
        $data['banner-about'] = Banner::where('group_name', 'banner-page-about')->get();
        if(!empty($data['banner-about'])){
            foreach ($data['banner-about'] as $key => $item) {
                if($item->type == 'video'){
                    $item->content = $this->get_youtube_code($item->content);
                }
            }
        }
        return view('About::About', ['about' => $data]);
    }

    private function get_youtube_code($url) {
        global $ttH;
        $pic_code = '';
        $output = 'https://www.youtube.com/embed/';
        if (strpos($url, 'https://www.youtube.com/embed') !== false) {
            if (strpos($url, 'iframe') !== false) {
                $tmp = explode('https://www.youtube.com/embed/', $url);
                if(isset($tmp[1])) {
                    $tmp_1 = explode(' ', $tmp[1]);
                    $result = str_replace('"' ,"", $tmp_1[0]);
                    return $result;
                    // if(isset($tmp_1[0])) {
                    //     $tmp_1[0] = str_replace("&quot;", '', $tmp_1[0]);
                    //     return $output.$tmp_1[0];
                    // }
                }
            }else{
                return $url;
            }
        }
        if (strpos($url, 'https://www.youtube.com/watch?v=') !== false) {
            $tmp = explode('https://www.youtube.com/watch?v=', $url);
            if (isset($tmp[1])) {
                // if (strpos($tmp[1], '"') !== false) {

                // }elseif(strpos($tmp[1], '&') !== false) {
                //     $tmp = explode('&', $tmp[1]);
                //     if (isset($tmp[0])) {
                //         $pic_code = $tmp[0];
                //     }
                //     return $output.$pic_code;
                // }else{
                //     return $output.$tmp[1];
                // }
                return $tmp[1];
            }
        }
        return $output;
    }
}
