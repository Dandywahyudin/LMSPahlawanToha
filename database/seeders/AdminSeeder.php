<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            'name' => 'Admin',
            'no_peserta' => '0000000000',
            'email' => 'danywahyudin13@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Dandy1910.'),
            // This is a hashed password for 'password'
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'admin',
        ];
        \App\Models\User::create($adminData);
    }
}
