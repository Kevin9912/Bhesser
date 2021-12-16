<?php

namespace App\Models;

use App\Models\subcatalogs;
use Illuminate\Database\Eloquent\Model;

class catalog extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'catalogos';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'code',
        'is_active',
        'created',
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
    public function subcatalogs()
    {
        return $this->hasMany(subcatalogs::class,'id_catalogo','id');
    }
    public function substatus()
    {
        return $this->hasMany(subcatalogs::class,'id_catalogo','id');
    }
    
}



