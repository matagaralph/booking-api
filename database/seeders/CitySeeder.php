<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder {
    public function run(): void {
        City::create([
            'country_id' => 1, // Angola
            'name' => 'Luanda',
            'lat' => -8.8390,
            'long' => 13.2894,
        ]);

        City::create([
            'country_id' => 2, // Zimbabwe
            'name' => 'Harare',
            'lat' => -17.8252,
            'long' => 31.0335,
        ]);
    }
}
