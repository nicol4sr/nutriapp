<?php

namespace Database\Seeders;

use App\Models\nacionalidades;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', '=', 'Administrador')->first();
        $entrenador = Role::where('name', '=', 'Entrenador')->first();
        $nutricionista = Role::where('name', '=', 'Nutricionista')->first();
        $psicologo = Role::where('name', '=', 'Psicologo')->first();
        $usuario = Role::where('name', '=', 'Usuario')->first();

        // REVISAR
        // SISTEMA
        User::create([
            'name' => 'Sistema',
            'email' => 'sistem_admin@email.com',
            'password' => bcrypt('admin'),
            'genero' => 0,
            'fecha_nacimiento' => '01/02/1999',
            'nacionalidad_id' => nacionalidades::inRandomOrder()->first()->id,
            'objetivo_id' => Tipo::inRandomOrder()->first()->id,
            'habitos' => rand(0, 4),
        ])->assignRole($admin);

        // ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin'),
            'genero' => 0,
            'fecha_nacimiento' => '12/02/1975',
            'nacionalidad_id' => nacionalidades::inRandomOrder()->first()->id,
            'objetivo_id' => Tipo::inRandomOrder()->first()->id,
            'habitos' => rand(0, 4),
        ])->assignRole($admin);

        // ENTRENADOR
        User::create([
            'name' => 'Jorge Gómez',
            'email' => 'entrenador@email.com',
            'password' => bcrypt('entrenador'),
            'genero' => 0,
            'fecha_nacimiento' => '23/02/1988',
            'nacionalidad_id' => nacionalidades::inRandomOrder()->first()->id,
            'objetivo_id' => Tipo::inRandomOrder()->first()->id,
            'habitos' => rand(0, 4),
        ])->assignRole($entrenador);

        // NUTRICIONISTA
        User::create([
            'name' => 'Marta Aguilar',
            'email' => 'nutricionista@email.com',
            'password' => bcrypt('nutricionista'),
            'genero' => 1,
            'fecha_nacimiento' => '12/05/1988',
            'nacionalidad_id' => nacionalidades::inRandomOrder()->first()->id,
            'objetivo_id' => Tipo::inRandomOrder()->first()->id,
            'habitos' => rand(0, 4),
        ])->assignRole($nutricionista);

        // PSICOLOGO
        User::create([
            'name' => 'Mario Hernández',
            'email' => 'psicologo@email.com',
            'password' => bcrypt('psicologo'),
            'genero' => 0,
            'fecha_nacimiento' => '12/02/1988',
            'nacionalidad_id' => nacionalidades::inRandomOrder()->first()->id,
            'objetivo_id' => Tipo::inRandomOrder()->first()->id,
            'habitos' => rand(0, 4),
        ])->assignRole($psicologo);

        // USUARIO
        User::create([
            'name' => 'Pedro López',
            'email' => 'usuario@email.com',
            'password' => bcrypt('usuario'),
            'genero' => 0,
            'fecha_nacimiento' => '12/11/2000',
            'nacionalidad_id' => nacionalidades::inRandomOrder()->first()->id,
            'objetivo_id' => Tipo::inRandomOrder()->first()->id,
            'habitos' => rand(0, 4),
        ])->assignRole($usuario);
    }
}
