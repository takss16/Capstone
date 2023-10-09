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
                'name' => 'Admin',
                'email' => 'miguel@example.com',
                'password' => Hash::make('pass123'), // Hash the password
            ],
            [
                'name' => 'cath',
                'email' => 'cath@example.com',
                'password' => Hash::make('pass123'), // Hash the password
            ],
            // Add more records as needed
            [
                'name' => 'leonard',
                'email' => 'lugtu@example.com',
                'password' => Hash::make('pass123'), // Hash the password
            ],
        ]);
    }

        
    }

