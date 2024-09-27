<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = ['factura_id', 'fecha_pago', 'metodo_pago', 'monto_pago'];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'ID_Factura');
    }
}
