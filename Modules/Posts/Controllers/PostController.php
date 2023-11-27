<?php

namespace Modules\Posts\Controllers;

use Illuminate\Http\Request;
use Modules\Ims\Controllers\ImsController;
use Illuminate\Support\Facades\DB;

use Modules\Posts\Models\Posts;

class PostController extends ImsController
{


    public function Detail(Posts $posts)
    {
        /// get lang
        $data['posts_lang'] = DB::table('posts_lang')
            ->where('lang', Config('ims.cur.lang'))
            ->get()
            ->pluck('lang_value', 'lang_key');
        $data['detail'] = $posts;

        return view('Posts::Detail', ['post' => $data]);
    }
}
