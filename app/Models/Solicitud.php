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
        return $this->belongsTo(Cliente::class);
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

    public function reparacion()
    {
        return $this->hasOne(Reparacion::class);
    }

    public function factura()
    {
        return $this->hasOne(Factura::class);
    }
}
