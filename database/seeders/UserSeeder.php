<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin_gaul',
            'email' => 'lJ1eA@example.com',
            'password' => Hash::make('admin'),
            'akses' => 'admin',
            'alamat' => 'tangerang',
            'telepon' => '4234234',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Petugas',
            'username' => 'petugas_gaul',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('petugas'),
            'akses' => 'petugas',
            'alamat' => 'tangerang',
            'telepon' => '6547567',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::create([
            'name' => 'Peminjam',
            'username' => 'peminjam_gaul',
            'email' => 'peminjam@gmail.com',
            'password' => Hash::make('peminjam'),
            'akses' => 'peminjam',
            'alamat' => 'tangerang',
            'telepon' => '5464566',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
