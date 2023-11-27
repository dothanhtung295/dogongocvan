<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user';

    protected $fillable = ['full_name', 'email', 'password','phone','address','province','district','ward'];
    protected $primaryKey = 'id';


}
