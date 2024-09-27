<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dispositivo>
 */
class DispositivoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Marca' => $this->faker->randomElement(['Samsung', 'Apple', 'Huawei', 'Xiaomi']),
            'Modelo' => $this->faker->bothify('Model ##??'),
            'IMEI' => $this->faker->unique()->numerify('###############'),
            'cliente_id' => Cliente::factory(), // Se relaciona con el factory de Cliente
        ];
    }
}
