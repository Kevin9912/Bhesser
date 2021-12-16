<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcatalogs extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'subcatalogos';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'is_active',
        'created',
        'id_catalogo',
        'name',
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



