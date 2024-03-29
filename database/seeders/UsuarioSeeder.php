<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Rol::all();
        $getRol = function ($name) use ($roles) {
            return $roles->where('rol', '=', $name)->first()->id;
        };

        // REVISAR
        // SISTEMA
        User::create([
            'name' => 'Sistema',
            'email' => 'sistem_admin@email.com',
            'rol_id' => $getRol('Administrador'),
            'password' => bcrypt('admin')
        ]);

        // ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'rol_id' => $getRol('Administrador'),
            'password' => bcrypt('admin')
        ]);

        // ENTRENADOR
        User::create([
            'name' => 'Jorge Gómez',
            'email' => 'entrenador@email.com',
            'rol_id' => $getRol('Entrenador'),
            'password' => bcrypt('entrenador')
        ]);

        // NUTRICIONISTA
        User::create([
            'name' => 'Marta Aguilar',
            'email' => 'nutricionista@email.com',
            'rol_id' => $getRol('Nutricionista'),
            'password' => bcrypt('nutricionista')
        ]);

        // PSICOLOGO
        User::create([
            'name' => 'Mario Hernández',
            'email' => 'psicologo@email.com',
            'rol_id' => $getRol('Psicologo'),
            'password' => bcrypt('psicologo')
        ]);

        // USUARIO
        User::create([
            'name' => 'Pedro López',
            'email' => 'usuario@email.com',
            'rol_id' => $getRol('Usuario'),
            'password' => bcrypt('usuario')
        ]);
    }
}
