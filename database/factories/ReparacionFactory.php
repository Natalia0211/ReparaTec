<?php

namespace Database\Factories;

use App\Models\Empleado;
use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reparacion>
 */
class ReparacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empleado_id' => Empleado::factory(), // Relaciona la reparación con un empleado
            'solicitud_id' => Solicitud::factory(), // Relaciona la reparación con una solicitud
            'fecha_reparacion' => $this->faker->dateTimeBetween('-1 month', 'now'), // Fecha de la reparación
            'costo_reparacion' => $this->faker->randomFloat(2, 50, 1000), // Costo de la reparación
            'estado' => $this->faker->randomElement(['pendiente', 'en proceso', 'completado']), // Estado de la reparación
        ];
    }
}
