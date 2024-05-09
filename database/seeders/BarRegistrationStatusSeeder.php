<?php

namespace Database\Seeders;

use App\Models\BarRegistrationStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarRegistrationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrationStatuses = [
            [
                'name' => 'Pending',
                'slug' => 'pending',
                'description' => 'Pending registration',
            ],
            [
                'name' => 'Approved',
                'slug' => 'approved',
                'description' => 'Approved registration',
            ],
            [
                'name' => 'Rejected',
                'slug' => 'rejected',
                'description' => 'Rejected registration',
            ],
        ];

        BarRegistrationStatus::insert($registrationStatuses);
    }
}
