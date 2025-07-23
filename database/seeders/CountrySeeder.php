<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder {
    public function run(): void {
        Country::create([
            'name' => 'Angola',
            'lat' => -11.2027,
            'long' => 17.8739
        ]);

        Country::create([
            'name' => 'Zimbabwe',
            'lat' => -19.0154,
            'long' => 29.1549
        ]);
    }
}
