<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypes = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Admin user',
            ],
            [
                'name' => 'Bar Owner',
                'slug' => 'bar-owner',
                'description' => 'Bar Owner user',
            ],
            [
                'name' => 'Drinker',
                'slug' => 'drinker',
                'description' => 'Drinker user',
            ],
        ];

        DB::table('user_types')->insert($userTypes);
    }
}
