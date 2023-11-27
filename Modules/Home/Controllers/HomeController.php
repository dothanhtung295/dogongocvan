<?php

namespace Modules\Home\Controllers;

use Modules\Ims\Controllers\ImsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Modules\Ims\Models\Banner;
use Modules\News\Models\News;
use Modules\News\Models\News_Group;
use Modules\Page\Models\Page;
use Modules\Product\Models\Product;
use Modules\Product\Models\Product_Brand;
use Modules\Product\Models\Product_Group;

class HomeController extends ImsController
{
    public function Home(Request $request)
    {
        // Home setting
        $data['setting'] = DB::table('home_setting')
            ->where('lang', Config('ims.cur.lang'))
            ->get();
        $data['setting'] = Arr::pluck($data['setting'], 'setting_value', 'setting_key');
        $data['home_lang'] = DB::table('home_lang')
            ->where('lang', Config('ims.cur.lang'))
            ->get()
            ->pluck('lang_value', 'lang_key');

        $data['products_focus'] = Product::where('is_focus', 1)->get();
        $data['groups_focus'] = Product_Group::where('is_focus', 1)->get();
        $data['products_new'] = Product::where('is_new', 1)->get();
        $data['products_group_focus'] = Product_Group::where('is_home', 1)->get();
        if (!empty($data['products_group_focus'])) {
            foreach ($data['products_group_focus'] as $key => $item) {
                $item->products = Product::where('group_id', $item->group_id)
                    ->limit(6)
                    ->get();
            }
        }
        $data['videos'] = Banner::where('group_name', 'video-home')
            ->orderBy('show_order')
            ->get();
        if (!empty($data['videos'])) {
            foreach ($data['videos'] as $key => $item) {
                if ($item->type == 'video') {
                    $item->content = $this->getYoutubeVideoId($item->content);
                }
            }
        }
        // dd($data['videos']);
        $data['news_focus'] = News::limit(5)->get();
        return view('Home::Home', ['home' => $data]);
    }

    function getYoutubeVideoId($url)
    {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);

        if (isset($params['v'])) {
            return $params['v'];
        } else {
            $path = parse_url($url, PHP_URL_PATH);
            $pathParts = explode('/', trim($path, '/'));

            if (in_array('embed', $pathParts)) {
                $index = array_search('embed', $pathParts);
                return $pathParts[$index + 1];
            }
        }

        return null;
    }
}
