<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $fillable = ['producto_id', 'cantidad', 'precio_unitario', 'proveedor_id',];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class,);
    }
}
