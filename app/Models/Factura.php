<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = ['solicitud_id', 'fecha_emision', 'monto_total', 'estado'];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'ID_Solicitud');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'ID_Factura');
    }
}
