<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $fillable = ['empresa', 'direccion', 'telefono', 'correo_electronico'];

    public function inventarios()
    {
        return $this->hasMany(Inventario::class,);
    }
}
