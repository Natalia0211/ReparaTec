<?php

namespace Database\Factories;

use App\Models\Factura;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pago>
 */
class PagoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'factura_id' => Factura::factory(), // Relaciona el pago con una factura
            'fecha_pago' => $this->faker->dateTimeBetween('-1 month', 'now'), // Fecha de pago
            'metodo_pago' => $this->faker->randomElement(['tarjeta', 'efectivo', 'transferencia',]), // Métodos de pago
            'monto_pago' => $this->faker->randomFloat(2, 50, 1000), // Monto del pago
        ];
    }
}
