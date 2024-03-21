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
        $rol_admin = Rol::where('rol', '=', 'Administrador')->first()->id;
        $rol_entrenador = Rol::where('rol', '=', 'Entrenador')->first()->id;

        $sistema = [
            'name' => 'Sistema',
            'email' => 'sistem_admin@email.com',
            'rol_id' => $rol_admin,
            'password' => bcrypt('admin')
        ];

        $admin = [
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'rol_id' => $rol_admin,
            'password' => bcrypt('admin')
        ];

        $entrenadores = [
            [
                'name' => 'Jorge Gómez',
                'email' => 'entrenador1@email.com',
                'rol_id' => $rol_entrenador,
                'password' => bcrypt('entrenador')
            ],
            [
                'name' => 'Lucía López',
                'email' => 'entrenador2@email.com',
                'rol_id' => $rol_entrenador,
                'password' => bcrypt('entrenador')
            ],
        ];

        User::create($sistema);
        User::create($admin);

        foreach ($entrenadores as $entrenador) {
            User::create($entrenador);
        }
    }
}
