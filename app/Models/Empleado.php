<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellidos', 'cargo', 'telefono', 'correo_electronico' , 'fecha_contratacion'];
    
    public function reparacions()
    {
        return $this->hasMany(Reparacion::class, 'empleado_id');
    }
}
