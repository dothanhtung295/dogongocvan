<?php

namespace Modules\News\Controllers;

use Illuminate\Http\Request;
use Modules\Ims\Controllers\ImsController;
use Illuminate\Support\Facades\DB;
use Modules\News\Models\News_Group;
use Illuminate\Support\Arr;
use Modules\News\Models\News;


class NewsController extends ImsController
{
    public function News(Request $request)
    {
        // get lang
        $data['news_lang'] = DB::table("news_lang")
            ->where("lang", Config("ims.cur.lang"))
            ->get()->pluck("lang_value", "lang_key");
        // get setting news
        $data['setting'] = DB::table("news_setting")
            ->get()->pluck("setting_value", "setting_key");

        $data['news_focus'] = News::where('is_focus', 1)->limit(9)->get();
        $data['list_news'] = News::where('is_focus', 0)->paginate($data['setting']['num_order_detail'] ?? 8);
        return view("News::News", ['news' => $data]);
    }

    public function Detail(News $new)
    {
        /// get lang
        $data['news_lang'] = DB::table("news_lang")
            ->where("lang", Config("ims.cur.lang"))
            ->get()->pluck("lang_value", "lang_key");
        $data['setting'] = DB::table("news_setting")
            ->get()->pluck("setting_value", "setting_key");
        $data['detail'] = $new;

        $data['related'] = News::whereNotIn("id", [$new->id])
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('News::Detail', ['news' => $data]);
    }
}
