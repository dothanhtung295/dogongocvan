<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Group extends Model
{
    use HasFactory;
    protected $table = 'product_group';

    public function getRouteKeyName(): string
    {
        return 'friendly_link';
    }

    public static function booted()
    {
        return static::addGlobalScope('show_default', function($builder){
            $builder->whereLang(Config('ims.cur.lang'))->where('is_show',1)->orderBy('show_order');
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'group_id', 'group_id')->whereLang(Config("ims.cur.lang"));
    }

    public function productsMenu()
    {
        return $this->hasMany(Product::class, 'group_id', 'group_id')->whereLang(Config("ims.cur.lang"))->where('is_focus', 1)->limit(6);
    }

    public function parentProductGroup()
    {
        return $this->hasMany(Product_Group::class,'parent_id');
    }

    public function subProductGroup()
    {
        return $this->hasMany(Product_Group::class, 'parent_id', 'group_id')
            ->where('is_show', 1)
            ->where("lang", Config("ims.cur.lang"))
            ->with('subProductGroup');
    }

    public function getTitleLimitAttribute()
    {
        $str = html_entity_decode($this->title);
        return \Str::limit(strip_tags($str), 12);
    }

}
