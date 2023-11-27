<?php

namespace Modules\News\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\News\Models\News_Group;
use \Illuminate\Support\Str;
class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public $timestamps = false;

    protected $fillable = [
        'picture',
        'title',
        'content',
        'meta_desc',
        'num_view',
        'friendly_link'
    ];
    public function getRouteKeyName(): string
    {
        return 'friendly_link';
    }

    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y'
    ];


    public function getShortNormalLimitAttribute()
    {
        $str = html_entity_decode($this->short);
        return Str::limit(strip_tags($str), 57);
    }

    public function getShortFocusLimitAttribute()
    {
        $str = html_entity_decode($this->short);
        return Str::limit(strip_tags($str), 256);
    }

    public function getTitleLimitAttribute()
    {
        $str = html_entity_decode($this->title);
        return Str::limit(strip_tags($str), 35);
    }
    protected static function booted()
    {
        static::addGlobalScope('show_lang_default', function (Builder $builder) {
            $builder->where('is_show', 1)->where('lang', Config('ims.cur.lang'))->orderBy('show_order');
        });
    }


}
