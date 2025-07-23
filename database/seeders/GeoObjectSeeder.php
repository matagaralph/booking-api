<?php

namespace Database\Seeders;

use App\Models\GeoObject;
use Illuminate\Database\Seeder;

class GeoObjectSeeder extends Seeder {
    
    public function run(): void {

        GeoObject::create([
            'city_id' => 1, // Luanda, Angola
            'name' => 'Fortaleza de São Miguel',
            'lat' => -8.8147,
            'long' => 13.2306,
        ]);

        GeoObject::create([
            'city_id' => 2, // Victoria Falls, Zimbabwe
            'name' => 'Victoria Falls',
            'lat' => -17.9244,
            'long' => 25.8567,
        ]);
    }
}
