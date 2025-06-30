<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; // Tambahkan ini untuk menggunakan Schema

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ---
        // NONAKTIFKAN PEMERIKSAAN FOREIGN KEY SEMENTARA
        // Ini memungkinkan truncate atau delete pada tabel yang memiliki relasi foreign key
        Schema::disableForeignKeyConstraints();
        // ---

        // Panggil UserSeeder
        $this->call([
            UserSeeder::class,
            // Jika Anda memiliki seeder lain (misalnya CategorySeeder, ProductSeeder),
            // pastikan untuk memanggilnya di sini juga.
            // Contoh:
            // CategorySeeder::class,
            // ProductSeeder::class,
        ]);

        // Baris ini akan membuat satu user tambahan, pastikan ini yang kamu inginkan
        // Jika UserSeeder sudah cukup, kamu bisa menghapus baris ini.
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // ---
        // AKTIFKAN KEMBALI PEMERIKSAAN FOREIGN KEY
        // Sangat penting untuk mengaktifkannya kembali setelah seeding selesai
        Schema::enableForeignKeyConstraints();
        // ---
    }
}