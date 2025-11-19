<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crea un usuario de prueba cada que se ejecutan las migraciones
         User::factory()->create([
            'name' => 'Dessi',
            'email' => 'dessire@gmail.com',
            'password' => bcrypt('12345678'),
            'id_number' => '123456789',
            'phone' => '5555555555',
            'address' => 'Calle 123, Colonia 456',
        ])->assignRole('Doctor');
    }
}