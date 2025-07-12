<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user lama jika ada, untuk menghindari duplikat email
        User::where('email', 'admin@laundry.com')->delete();
        User::where('email', 'pelanggan@laundry.com')->delete();

        User::create([
            'name' => 'Admin Laundry',
            'email' => 'admin@laundry.com',
            'role' => 'admin', 
            'password' => Hash::make('password'), 
        ]);

        // Buat user pelanggan baru
        User::create([
            'name' => 'Pelanggan Biasa',
            'email' => 'pelanggan@laundry.com',
            'role' => 'pelanggan', 
            'password' => Hash::make('password'), 
        ]);
    }
}
