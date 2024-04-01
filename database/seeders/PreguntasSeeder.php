<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Seeder;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 0 -> psicologico
        // 1 -> fisico
        // 2 -> calórico
        $preguntas = [
            // PSICOLÓGICAS
            [
                'tipo' => 0,
                'nombre' => '¿Cómo valora su imagen física en este momento, de forma positiva o negativa?'
            ],
            [
                'tipo' => 0,
                'nombre' => '¿Qué piensa de su peso actual?'
            ],
            [
                'tipo' => 0,
                'nombre' => '¿Le obsesiona lo que ha comido o lo que ha de comer?'
            ],
            [
                'tipo' => 0,
                'nombre' => '¿Se ha modificado su peso en las últimas semanas?'
            ],
            [
                'tipo' => 0,
                'nombre' => '¿Sufre de falta de concentración y/o memoria?'
            ],
            [
                'tipo' => 0,
                'nombre' => '¿Ha notado debilidad en sus músculos?'
            ],
            [
                'tipo' => 0,
                'nombre' => '¿Se encuentra preocupada/o por su figura?'
            ],
            [
                'tipo' => 0,
                'nombre' => '¿Cuantas horas duerme al día?'
            ],
            [
                'tipo' => 0,
                'nombre' => '¿Sufre de estrés?'
            ],
            [
                'tipo' => 0,
                'nombre' => 'Tiene sintomas de ansiedad?'
            ],

            // FÍSICAS
            [
                'tipo' => 1,
                'nombre' => '¿Actualmente hace ejercicio o algún deporte?'
            ],
            [
                'tipo' => 1,
                'nombre' => '¿Por qué decidió comenzar a hacer ejercicio?'
            ],
            [
                'tipo' => 1,
                'nombre' => '¿Cuánto tiempo puede dedicarle al entrenamiento?'
            ],

            // CALÓRICAS
            [
                'tipo' => 1,
                'nombre' => '¿Cuantas veces come al día ?'
            ],
            [
                'tipo' => 1,
                'nombre' => '¿Come muchos alimentos con azúcar?'
            ],
            [
                'tipo' => 1,
                'nombre' => '¿Tiene una alimentación balanceada?'
            ],
            [
                'tipo' => 1,
                'nombre' => '¿Tiene alergia a algún alimento?'
            ],
        ];

        foreach ($preguntas as $pregunta) {
            Pregunta::create($pregunta);
        }
    }
}
