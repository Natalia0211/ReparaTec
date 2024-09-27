<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;
    protected $fillable = ['solicitud_id', 'empleado_id', 'fecha_reparacion', 'costo_reparacion'];
    
    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'ID_Solicitud');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ID_Empleado');
    }
}
