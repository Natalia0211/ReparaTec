<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'descripcion' => fake()->text(),
            'precio' => fake()->numberBetween(10000, 50000),
            'cantidad' => fake()->numberBetween(1, 100),
            'categoria_id' => Categoria::inRandomOrder()->first()->id, // Asigna un id de categoría
            'proveedor_id' => Proveedor::factory(),
        ];
    }
}
