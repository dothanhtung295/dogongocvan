<?php

namespace App\Modules\Home\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'group_id' ,
        'group_nav' ,
        'friendly_link',
        'meta_title',
        'is_show',
        'show_order',
        'title' ,
        'lang',
    ];
    protected $primaryKey = 'page_id';

    protected $table = 'page';

    public function page_group(){
        return $this->belongsTo(Page_Group::class,'group_id','group_id')->wherelang(Config("ims.cur.lang"));
    }

}
