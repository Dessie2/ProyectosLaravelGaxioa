<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //LLamar a RoleSeeder
        $this -> call([
            RoleSeeder::class,
        ]);

        //Crear un usuario de prueba cada vez que se ejecuten migraciones

        User::factory()->create([
            'name' => 'Dessie',
            'email' => 'Dessie@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}