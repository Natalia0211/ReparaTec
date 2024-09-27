<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria_id'];

    public function categoría()
    {
        return $this->belongsTo(Categoria::class, 'ID_Categoría');
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class,);
    }
}
