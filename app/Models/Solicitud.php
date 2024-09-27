<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'dispositivo_id', 'fecha_solicitud', 'descripcion_problema'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class, 'ID_Dispositivo');
    }

    public function reparaciones()
    {
        return $this->hasMany(Reparacion::class, 'ID_Solicitud');
    }

    public function factura()
    {
        return $this->hasOne(Factura::class, 'ID_Solicitud');
    }
}
