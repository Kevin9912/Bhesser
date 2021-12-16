<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'proveedores';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'is_active',
        'created',
        'name',
        'date_relation',
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