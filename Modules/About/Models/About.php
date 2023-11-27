<?php

namespace Modules\About\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'about';

    public static function about(){
        $data = About::where("lang", Config("ims.cur.lang"))
            ->where('is_show', 1)
            ->select('id','title','short','content','picture','picture_banner','arr_custom')
            ->first()
            ->toArray();

        return $data;
    }
}
