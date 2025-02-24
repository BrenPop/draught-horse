<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // /** Seed data tables */
        $this->call(UserTypeSeeder::class);
        $this->call(BarTypeSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(BarRegistrationStatusSeeder::class);

        // /** Seed user data */
        $this->call(UserSeeder::class);
    }
}
