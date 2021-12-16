<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'inventario';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'Article',
        'status',
        'date_in',
        'date_out',
        'sucursal',
        'cantidad',
        'estado_fisico',
        'unitario',
        'precio_unitario',
        'precio_venta',
        'precio',
        'id_proveedor',
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

    public function proveedor()
    {
        return $this->hasOne(proveedores::class, 'id', 'id_proveedor');
    }

    public function office()
    {
        return $this->hasOne(office::class, 'id', 'Sucursal');
    }

    public function ventas()
    {
        return $this->hasOne(ventas::class, 'id_inventario', 'id');
    }
    
}