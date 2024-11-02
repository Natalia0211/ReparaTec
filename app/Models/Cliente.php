<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellidos', 'telefono', 'correo_electronico'];

    public function dispositivos()
    {
        return $this->hasMany(Dispositivo::class, 'cliente_id');
    }

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'cliente_id');
    }
}
