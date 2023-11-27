<?php

namespace Modules\Posts\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts_Group extends Model
{
    use HasFactory;
    protected $table = 'posts_group';

    public function getRouteKeyName(): string
    {
        return 'friendly_link';
    }
    protected static function booted()
    {
        static::addGlobalScope('show_lang_default', function (Builder $builderp) {
            $builderp->where('is_show', 1)->wherelang(Config("ims.cur.lang"));
        });
    }
}
