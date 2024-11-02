<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id', 'dispositivo_id', 'fecha_solicitud', 'descripcion_problema', 'estado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class, 'dispositivo_id');
    }

    public function reparaciones()
    {
        return $this->hasMany(Reparacion::class, 'solicitud_id');
    }

    public function factura()
    {
        return $this->hasOne(Factura::class, 'solicitud_id');
    }
}
