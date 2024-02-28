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
        $adminUserId = UserType::where('slug', 'admin')->first()->id;
        $barUserId = UserType::where('slug', 'bar')->first()->id;
        $drinkerUserId = UserType::where('slug', 'drinker')->first()->id;

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => 'adminpassword',
            'user_type_id' => $adminUserId
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Bar User',
            'email' => 'bar@test.com',
            'password' => 'barpassword',
            'user_type_id' => $barUserId
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Drinker User',
            'email' => 'drinker@test.com',
            'password' => 'drinkerpassword',
            'user_type_id' => $drinkerUserId
        ]);
    }
}
