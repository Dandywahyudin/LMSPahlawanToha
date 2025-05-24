<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $siswaData = [
            ['name' => 'Alika Zhalmia', 'password' => '0081145937'],
            ['name' => 'Alma', 'password' => '0076683237'],
            ['name' => 'Alya Agustina', 'password' => '0078318714'],
            ['name' => 'Asep Rodian', 'password' => '0065082911'],
            ['name' => 'Ayu Ning Tyas', 'password' => '0089636154'],
            ['name' => 'Dede Sakti Ramdani', 'password' => '0061686418'],
            ['name' => 'Devina Ayu Lestari', 'password' => '0061206110'],
            ['name' => 'Dita Rahma Dini', 'password' => '0074543510'],
            ['name' => 'Dona Anastasya', 'password' => '0083070831'],
            ['name' => 'Erik Diyas Rahmadan', 'password' => '0153643079'],
            ['name' => 'Erik Muhamad', 'password' => '0072376012'],
            ['name' => 'Fajar Jaya Kusuma Garcia', 'password' => '0086108498'],
            ['name' => 'Kezia', 'password' => '0083827941'],
            ['name' => 'Moh. Rahim Zulkifli', 'password' => '0085462232'],
            ['name' => 'Muhamad Arya Aditya', 'password' => '0086413361'],
            ['name' => 'Muhamad Fathir Al Farizi', 'password' => '0071917030'],
            ['name' => 'Muhamad Ikhsan Alfari', 'password' => '0076070210'],
            ['name' => 'Muhammad Fahmi Nur Naufal', 'password' => '0072476570'],
            ['name' => 'Muhammad Naufal Al Ghifari', 'password' => '0077979327'],
            ['name' => 'Reva Maldini', 'password' => '0065339060'],
            ['name' => 'Ririn Dwi Aryanti', 'password' => '3067398244'],
            ['name' => 'Risma Yanti Pertiwi', 'password' => '0078936107'],
            ['name' => 'Riyanti Nurdini', 'password' => '0082270472'],
            ['name' => 'Sabrina Salsabila', 'password' => '0072391957'],
            ['name' => 'Saira Nur Ramadhanti', 'password' => '0074177523'],
            ['name' => 'Salma Amelia Putri', 'password' => '0065626314'],
            ['name' => 'Salma Aprilia Wulandari', 'password' => '0071714794'],
            ['name' => 'Tiara Agustin Meilani', 'password' => '0085215066'],
            ['name' => 'Virla Azzahra Ainur Rahman', 'password' => '0078661102'],
            ['name' => 'Widjia As Serlina', 'password' => '0074685842'],
            ['name' => 'Wiltri Nengsih Eka Pratama', 'password' => '0083568530'],
            ['name' => 'Yanti Aryanti', 'password' => '3082524058'],
            ['name' => 'Yuni Amelia', 'password' => '3070379172'],
        ];

        foreach ($siswaData as $siswa) {
            $email = strtolower(str_replace(' ', '.', $siswa['name'])) . '@example.com';
            
            DB::table('users')->insert([
                'name' => $siswa['name'],
                'email' => $email,
                'password' => Hash::make($siswa['password']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}