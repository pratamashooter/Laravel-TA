<?php

namespace Database\Seeders;

use App\Models\Sensor as ModelsSensor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sensor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsSensor::factory()->count(20)->create();
    }
}
