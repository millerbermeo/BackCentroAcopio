<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'id' => 1,
            'nombre' => "administrador",
            'apellidos' => "admin",
            'identificacion' => '123456789',
            'email' => 'admin@sena.edu.co',
            'password' => bcrypt('adminpass'),
            'rol' => 1
        ]);
    }
}
