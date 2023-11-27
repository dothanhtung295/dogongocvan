<?php

namespace Modules\Ims\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    public $timestamps = false;

    protected $table = 'menu';

    protected $fillable = array('id', 'parent_id', 'title', 'link');

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function subMenu()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'menu_id')
            ->where('is_show', 1)
            ->where("lang", Config("ims.cur.lang"))
            ->with('subMenu');
    }

    static function menuSub($group_id = null)
    {
        $menuSub = Menu::where('is_show', 1)
            ->where("group_id", $group_id)
            ->where("lang", Config("ims.cur.lang"))
            ->get();
        foreach ($menuSub as $k => $row) {
            switch ($row['auto_sub']) {
                case 'group':
                    break;
                case 'item':
                    switch ($row['name_action']) {
                        case 'fieldactivity':
                            $where = ['is_focus' => 1];
                            break;
                        default:
                            $where = null;
                            break;
                    }
                    $menuSub[$k]['menuSub'] = DB::table($row['name_action'])
                        ->where('is_show', 1)
                        ->where("lang", Config("ims.cur.lang"))
                        ->where($where)
                        ->orderBy('show_order', 'DESC')
                        // ->take(5)
                        ->get();
                    break;
                default:
                    break;
            }
        }
        return $menuSub;
    }
}
