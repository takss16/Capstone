<?php

namespace Database\Seeders;

use App\Models\MedicineName;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedicineNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert sample medicine names
        MedicineName::create(['name' => 'Medicine']);
        MedicineName::create(['name' => 'Medicine']);
        // Add more records as needed
    }
}
