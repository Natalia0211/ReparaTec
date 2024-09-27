<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;
    protected $fillable = ['marca', 'modelo', 'imei', 'cliente_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'ID_Dispositivo');
    }
}
