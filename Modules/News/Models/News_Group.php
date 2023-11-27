<?php

namespace Modules\News\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_Group extends Model
{
    use HasFactory;
    protected $table = 'news_group';

    public function getRouteKeyName(): string
    {
        return 'friendly_link';
    }
    protected static function booted()
    {
        static::addGlobalScope('show_lang_default', function (Builder $builder) {
            $builder->where('is_show', 1)->where('lang',Config('ims.cur.lang'));
        });
    }
    public function news()
    {
        return $this->hasMany(News::class, 'group_id', 'group_id');
    }

 
}
