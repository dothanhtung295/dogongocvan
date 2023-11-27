<?php

namespace Modules\Ims\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Friendly_Link extends Model
{
    protected $table = 'friendly_link';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('select', function (Builder $builder) {
            return $builder->select('module','action','dbtable','dbtable_id','lang','friendly_link');
        });
    }

    public function get_link_lang() {
        // \DB::enableQueryLog();
        if ($this->module === $this->action) {
            return $this->friendly_link;
        } else {
            $class  = "Modules\\" . ucfirst($this->module) . "\\Models\\" . ucwords($this->dbtable, '_');
            $module = Friendly_Link::where([
                'module' => $this->module,
                'action' => $this->module,
                'lang' => $this->lang
            ])->first()->friendly_link;
            if ($this->action === "group") {
                $group = config('ims.lang.'.$this->lang.'.friendly_link');
                return "{$module}/{$group}";
            }
            if ($this->action === "detail") {
                $item = $class::withoutGlobalScopes()
                    ->where([
                        "item_id" => $this->dbtable_id,
                        "lang" => $this->lang,
                        "is_show" => 1,
                    ])->first();
                // $relate = Str::lower($this->dbtable) . 'Group';
                if($this->module === 'recruitment') {
                    return "{$module}/{$item->friendly_link}";
                }
                if ($item->group_id) {
                    $group = Friendly_Link::where([
                        'module' => $this->module,
                        'dbtable' => $this->module . "_group",
                        'dbtable_id' => $item->group_id,
                        'lang' => $this->lang
                    ])->first()->friendly_link;
                    return "{$module}/{$group}/{$item->friendly_link}";
                }
                return "{$module}/{$item->friendly_link}";
            }
        }
    }
}
