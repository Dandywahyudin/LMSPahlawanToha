<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk mengisi database.
     *
     * @return void
     */
    public function run()
    {
        // Tentukan path (lokasi) ke file CSV Anda.
        // Pastikan path ini benar.
        // Sebagai contoh, buat folder 'csv' di dalam 'database/seeders/'
        // lalu letakkan file CSV Anda di sana.
        $csvFilePath = database_path('seeders/csv/MASTER DATA PSAT.xlsx - master data kartu peserta (1).csv');

        // Cek apakah file CSV ditemukan
        if (!file_exists($csvFilePath)) {
            $this->command->error("File CSV tidak ditemukan di: " . $csvFilePath); // Tampilkan pesan error jika tidak ada
            return; // Hentikan proses jika file tidak ada
        }

        // Buat instance untuk membaca CSV
        // 'r' berarti file dibuka untuk mode membaca (read)
        $csv = Reader::createFromPath($csvFilePath, 'r');
        $csv->setHeaderOffset(0); // Anggap baris pertama CSV adalah header (judul kolom)

        $records = $csv->getRecords(); // Ambil semua baris data dari CSV

        // Looping untuk setiap baris data di CSV
        foreach ($records as $record) {
            // Ambil data dari setiap kolom berdasarkan nama header di CSV.
            // Sesuaikan 'Nama Lengkap', 'No Peserta', 'Password' jika nama header di file CSV Anda berbeda.
            // Operator '?? null' digunakan untuk keamanan, jika kolom tidak ada maka nilainya akan null.
            $name = $record['NAMA'] ?? null;
            $noPeserta = $record['NO.PESERTA'] ?? null;
            $password = $record['PASSWORD'] ?? null;

            // Lewati baris ini jika data penting (nama, no peserta, atau password) kosong
            if (is_null($name) || is_null($noPeserta) || is_null($password)) {
                $this->command->warn("Melewati baris karena data tidak lengkap: " . json_encode($record));
                continue; // Lanjut ke baris berikutnya
            }

            // Buat email dari nama (sesuai contoh Anda)
            // Ubah nama menjadi huruf kecil, ganti spasi dengan titik, lalu tambahkan @example.com
            $email = strtolower(str_replace(' ', '.', $name)) . '@example.com';

            // Masukkan data ke tabel 'users'
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'no_peserta' => $noPeserta,
                'password' => Hash::make($password), // Enkripsi password sebelum disimpan
                'created_at' => now(), // Timestamp kapan data dibuat
                'updated_at' => now(), // Timestamp kapan data terakhir diubah
            ]);
        }

        $this->command->info('Proses seeding data user dari CSV selesai!'); // Pesan jika berhasil
    }
}