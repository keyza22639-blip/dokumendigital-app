<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::where('email', 'admin@arsip.com')->count() == 0) {
            User::create([
                'name' => 'Administrator Arsip',
                'email' => 'Kyla87406@gmail.com', // Email yang akan Anda gunakan untuk login
                'password' => Hash::make('Shin_keyza09'), // Password: password123
            ]);
            echo "Akun Admin telah dibuat: kyla87406@gmail.com / Shin_keyza09";
        }
    }
}
