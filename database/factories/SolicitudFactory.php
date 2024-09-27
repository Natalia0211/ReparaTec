<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Dispositivo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solicitud>
 */
class SolicitudFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(), // Relaciona la solicitud con un cliente
            'dispositivo_id' => Dispositivo::factory(), // Relaciona la solicitud con un dispositivo
            'fecha_solicitud' => $this->faker->dateTimeBetween('-1 months', 'now'),
            'descripción_problema' => $this->faker->sentence(),
        ];
    }
}
