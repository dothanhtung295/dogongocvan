<?php

namespace App\Modules\Home\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page_Group extends Model
{
    use HasFactory;
    protected $table = 'page_group';

    public function page()
    {
        return $this->hasMany(Page::class, 'group_id', 'group_id');
    }
}
