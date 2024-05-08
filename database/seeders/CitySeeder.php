<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonString = file_get_contents(base_path('public/json/seed_data/cities-list.json'));

        $citiesArray = json_decode($jsonString, true);

        $data = [];
        foreach ($citiesArray as $city) {

            $province = \App\Models\Province::where('name', $city['admin_name'])->first();

            if (!$province)
                continue;

            $data[] = [
                'name' => $city['city'],
                'iso2' => $city['iso2'],
                'province_id' => $province->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        City::Insert($data);
    }
}
