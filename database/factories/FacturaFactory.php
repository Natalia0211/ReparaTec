<?php

namespace Database\Factories;

use App\Models\Solicitud;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'solicitud_id' => Solicitud::factory(), // Relaciona la factura con una solicitud
            'fecha_emision' => $this->faker->dateTimeBetween('-1 months', 'now'),
            'monto_total' => $this->faker->randomFloat(2, 100, 500),
            'estado' => $this->faker->randomElement(['pagado', 'pendiente', 'cancelado']),
        ];
    }
}
