<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deuda>
 */
class DeudaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_comerciante' => $this->faker->paragraph(1),
            'nro_documento' => $this->faker->randomNumber(8),
            'nro_puesto' => $this->faker->randomElement(['C30', 'A14', 'B25', 'D18', 'E42']),
            'monto_mensual_alquiler' => $this->faker->randomFloat(2, 100, 1000),
            'fecha_facturacion' => $this->faker->date('Y-m-d', 'now'),
            'fecha_pago' => $this->faker->date('Y-m-d', 'now'),
            'monto_pagado' => $this->faker->randomFloat(2, 100, 1000),
            'deuda_pendiente' => $this->faker->randomFloat(2, 0, 10),
            'estado_pago' => $this->faker->randomElement(['PAGADO', 'PENDIENTE']),
        ];
    }
}
