<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'ventas';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'monto',
        'id_caja',
        'id_inventario',
        'cantidad',
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
        'monto' => 'double'
    ];
    
    public function caja()
    {
        return $this->hasOne(caja::class,'id','id_caja');
    }

    public function producto()
    {
        return $this->hasOne(inventario::class,'id','id_inventario');
    }


}
