<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data user lama jika ada, untuk menghindari duplikat
        // Ini akan berhasil karena foreign key constraints dinonaktifkan di DatabaseSeeder
        User::truncate();

        // Buat Akun Admin
        User::create([
            'name' => 'Admin Desa',
            'email' => 'admin@desa.gomarket',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Buat Akun Penjual
        User::create([
            'name' => 'Toko Barokah',
            'email' => 'penjual@desa.gomarket',
            'password' => Hash::make('12345678'),
            'role' => 'penjual',
        ]);

        // Buat Akun Pembeli
        User::create([
            'name' => 'Budi Pembeli',
            'email' => 'pembeli@desa.gomarket',
            'password' => Hash::make('12345678'),
            'role' => 'pembeli',
        ]);
    }
}