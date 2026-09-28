<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios de prueba
        User::create([
            'name' => 'Usuario Prueba 1',
            'email' => 'usuario1@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Usuario Prueba 2',
            'email' => 'usuario2@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
