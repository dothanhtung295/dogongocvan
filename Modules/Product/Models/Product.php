<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    public function getRouteKeyName(): string
    {
        return 'friendly_link';
    }
    protected $with = ['group', 'comments'];

    public function group()
    {
        return $this->belongsTo(Product_Group::class, 'group_id');
    }
    public function comments()
    {
        return $this->hasMany(Product_Comment::class, 'product_id');
    }

    public function getShortLimitAttribute()
    {
        $str = html_entity_decode($this->short);
        return Str::limit(strip_tags($str), 80);
    }

    public function getTitleLimitAttribute()
    {
        $str = html_entity_decode($this->title);
        return Str::limit(strip_tags($str), 25);
    }

    public static function booted(){
        return static::addGlobalScope('show_default', function(Builder $builder){
            $builder->whereLang(Config('ims.cur.lang'))->where('is_show', 1)->orderBy('show_order');
        });
    }

    public static function listProductSearch($searchTerm, $config)
    {
        $query = Product::where('is_show', 1)
            ->where('lang', Config("ims.cur.lang"))
            ->orderBy('updated_at', 'desc');
        if (!empty($searchTerm)) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'LIKE', "%$searchTerm%")
                    ->orWhereHas('group', function ($query) use ($searchTerm) {
                        $query->where('title', 'LIKE', "%$searchTerm%")
                            ->orWhereHas('products', function ($query) use ($searchTerm) {
                                $query->where('title', 'LIKE', "%$searchTerm%");
                            });
                    });
            });
        }
        $data = $query->with('group')->paginate($config)->appends(['key' => $searchTerm]);
        return $data;
    }

}
