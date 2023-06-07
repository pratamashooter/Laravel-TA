<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sensor>
 */
class SensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'suhu'=> fake()->randomFloat(1,20,40),
            'kelembaban'=> fake()->randomFloat(1,30,70),
            'berat'=> fake()->randomFloat(1,0,10),

        ];
    }
}
