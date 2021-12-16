<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\office;

class Client extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'clientes';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'id_person',
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

    public function people()
    {
        return $this->hasOne(People::class,'id','id_person');
    }

    public function office()
    {
        return $this->hasOne(office::class,'id','id_office');
    }
    
}



