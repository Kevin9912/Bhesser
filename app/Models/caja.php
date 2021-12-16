<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class caja extends Model
{
    #use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'caja';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'is_active',
        'monto_apertura',
        'id_user_cargo',
        'monto_cierre',
        'fecha_cierre',
        'fecha_apertura',
        'status',
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
        'monto_cierre' => 'double',
        'monto_apertura' => 'double'
    ];
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'id_user_cargo');
    }
    public function ventas()
    {
        return $this->hasMany(ventas::class, 'id_caja', 'id');
    }
}
