<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'personas';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'lastname_p',
        'lastname_m',
        'birthdate',
        'address',
        'phone',
        'email',
    ];
   

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];
    

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

}



