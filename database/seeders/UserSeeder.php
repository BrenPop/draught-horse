<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUserTypeId = UserType::where('slug', 'admin')->first()->id;
        $barUserTypeId = UserType::where('slug', 'bar')->first()->id;
        $drinkerUserTypeId = UserType::where('slug', 'drinker')->first()->id;

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => 'adminpassword',
            'user_type_id' => $adminUserTypeId
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Bar User',
            'email' => 'bar@test.com',
            'password' => 'barpassword',
            'user_type_id' => $barUserTypeId
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Drinker User',
            'email' => 'drinker@test.com',
            'password' => 'drinkerpassword',
            'user_type_id' => $drinkerUserTypeId
        ]);
    }
}
