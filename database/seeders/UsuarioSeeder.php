<?php

namespace Database\Seeders;

use App\Models\DatosUsuario;
use App\Models\nacionalidades;
use App\Models\Pregunta;
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
            'altura' => rand(1.6, 2.2),
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
            'altura' => rand(1.6, 2.2),
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
            'altura' => rand(1.6, 2.2),
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
            'altura' => rand(1.6, 2.2),
        ])->assignRole($psicologo);

        // USUARIO
        $usuario = User::create([
            'name' => 'Pedro López',
            'email' => 'usuario@email.com',
            'password' => bcrypt('usuario'),
            'genero' => 0,
            'fecha_nacimiento' => '12/11/2000',
            'nacionalidad_id' => nacionalidades::inRandomOrder()->first()->id,
            'objetivo_id' => Tipo::inRandomOrder()->first()->id,
            'habitos' => rand(0, 4),
            'altura' => rand(1.6, 2.2),
        ])->assignRole($usuario);

        $respuestas = [
            1 => 'Valoro mi imagen física en este momento de forma positiva.',
            2 => 'Estoy de acuerdo con mi peso actual.',
            3 => 'No tengo obsesión alguna.',
            4 => 'He mantenido mi peso en las últimas semanas.',
            5 => 'A veces no puedo concentrarme.',
            6 => 'Por los momentos no.',
            7 => 'Me agrada mi figura.',
            8 => 'Duermo alrededor de 7 horas al día.',
            9 => 'No sufro de estrés.',
            10 => 'No tengo síntomas de ansiedad.',
            11 => 'Actualmente hago ejercicio y practico baloncesto.',
            12 => 'Comencé a hacer ejercicio para mantenerme activo y mejorar mi salud mental.',
            13 => 'Puedo dedicarle al entrenamiento alrededor de 2 - 4 horas al día.',
            14 => 'Unas 3 veces al día.',
            15 => 'A veces como alimentos con azúcar, pero busco de mantener una dieta balanceada.',
            16 => 'Considero que no está del todo balanceada',
            17 => 'No tengo alergia a ningún alimento.',
        ];

        $preguntas = Pregunta::pluck('id');
        $usuario = User::where('email', '=', 'usuario@email.com')->first();
        foreach ($preguntas as $i) {
            DatosUsuario::create([
                'respuesta' => $respuestas[$i],
                'pregunta_id' => $i,
                'usuario_id' => $usuario->id,
            ]);
        }
    }
}
