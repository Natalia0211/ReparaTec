<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'cantidad', 'categoria_id', 'proveedor_id'];

    public function categoría()
    {
        return $this->belongsTo(Categoria::class, 'categoría_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class,);
    }
}
