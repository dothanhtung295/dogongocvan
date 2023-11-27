<?php

namespace Modules\Contact\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'full_name' ,
        'content' ,
        'phone' ,
        'email',
        'type' ,
        'date_create',
        'date_update',
    ];
    protected $primaryKey = 'contact_id';

    protected $table = 'contact';
}
