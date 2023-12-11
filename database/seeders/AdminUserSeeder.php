<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->insert([
            [
                'first_name' => 'Miguel',
                'Last_name' => 'Manugue',
                'middle_name' => 'S',
                'email' => 'taks@example.com',
                'user_level' => 'admin',
                'password' => Hash::make('pass123'), // Hash the password
            ],
            [
                'first_name' => 'John Paul',
                'Last_name' => 'Espinosa',
                'middle_name' => '',
                'email' => 'paul@example.com',
                'user_level' => 'midwife',
                'password' => Hash::make('pass123'), // Hash the password
            ],
            // Add more records as needed
            [
                'first_name' => 'Ace Van',
                'Last_name' => 'Cadiz',
                'middle_name' => '',
                'email' => 'ace@example.com',
                'user_level' => 'midwife',
                'password' => Hash::make('pass123'), // Hash the password
            ],
           
        ]);
    }

        
    }

