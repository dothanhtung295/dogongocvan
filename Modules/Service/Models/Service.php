<?php

namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $table = 'service';
    public function getRouteKeyName(): string
    {
        return 'friendly_link';
    }
    protected static function booted()
    {
        static::addGlobalScope('show_lang_default', function (Builder $builderp) {
            $builderp
                ->where('is_show', 1)
                ->where('lang', Config('ims.cur.lang'))
                ->orderBy('show_order');
        });
    }
}
