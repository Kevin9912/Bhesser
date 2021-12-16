<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class office extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'office';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'business_name',
        'rfc',
        'id_company',
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
    ];

    public function company()
    {
        return $this->hasOne(company::class, 'id', 'id_company');
    }
    
}