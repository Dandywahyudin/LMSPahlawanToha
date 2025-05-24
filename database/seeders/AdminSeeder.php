<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            'name' => '',
            'email' => '',
            'role' => 'admin',
        ];
        \App\Models\User::create($adminData);
    }
}
