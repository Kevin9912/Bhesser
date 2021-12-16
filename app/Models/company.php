<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'company';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'town',
        'postal_code',
        'phone',
        'address',
        'state',
        'email',
        'website',
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