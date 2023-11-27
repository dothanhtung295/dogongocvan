<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Comment extends Model
{
    use HasFactory;
    protected $table = 'product_comments';
    protected $fillable = ['user_id', 'product_id','name', 'email', 'rate', 'content'];

    public function product()
    {
        return $this->belongsTo(Product_Group::class, 'item_id');
    }
}
