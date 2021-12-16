<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\People;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'usuario';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'user_name',
        'password',
        'id_cat_role',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'id',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'user_name' => 'string',
        'is_active' => 'boolean',
    ];

    public function people()
    {
        return $this->hasOne(People::class, 'id', 'id_person');
    }

    public function cajaActiva()
    {
        return $this->belongsTo(caja::class, 'id', 'id_user_cargo')->where(["status" => "ABIERTO", "is_active" => 1]);
    }

    public function subcatalogos()
    {
        return $this->hasMany(subcatalogs::class,'id_cat_role','id');
    }
    public function roles()
    {
        return $this->hasMany(subcatalogs::class,'id','id_cat_role');
    }
}
