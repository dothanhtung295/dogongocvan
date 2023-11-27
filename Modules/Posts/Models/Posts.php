<?php

namespace Modules\Posts\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'title1',
    ];
    protected $primaryKey = 'id';
    public function getRouteKeyName(): string
    {
        return 'friendly_link';
    }
    protected static function booted()
    {
        static::addGlobalScope('show_lang_default', function (Builder $builderp) {
            $builderp->where('lang','vi')->where('is_show', 1);
        });
    }
}
