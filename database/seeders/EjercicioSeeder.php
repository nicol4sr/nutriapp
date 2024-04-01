<?php

namespace Database\Seeders;

use App\Models\Ejercicio;
use Illuminate\Database\Seeder;

class EjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ejercicios = [
            [
                'nombre' => 'Semana 1',
                'descripcion' => '1. Flexión normal (20x) \r\n2. Flexión isométrica (15 segundos)\r\n3. Flexión aislada (10x cada lado)\r\n4. Flexión declinada (20x)\r\n5. Flexión inclinada (15x)\r\n6. Flexión explosiva (10x)',
            ],
            [
                'nombre' => 'Semana 2',
                'descripcion' => '1. Sentadilla (20x) \r\n2. Sentadillas bulgaras (20x)',
            ],
            [
                "nombre" => "Flexión normal",
                "descripcion" => "1. Colócate en posición de plancha con las manos ligeramente más abiertas que el ancho de los hombros. 2. Flexiona los codos y baja el cuerpo hasta que el pecho casi toque el suelo. 3. Vuelve a la posición inicial extendiendo los brazos."
            ],
            [
                "nombre" => "Flexión isométrica",
                "descripcion" => "1. Colócate en posición de plancha con los brazos extendidos. 2. Mantén la posición durante 15 segundos, manteniendo el cuerpo recto y los abdominales contraídos."
            ],
            [
                "nombre" => "Flexión aislada",
                "descripcion" => "1. Colócate en posición de plancha con las manos ligeramente más abiertas que el ancho de los hombros. 2. Flexiona el codo derecho y baja el cuerpo hasta que el pecho casi toque el suelo. 3. Vuelve a la posición inicial extendiendo el brazo. 4. Repite el ejercicio con el brazo izquierdo."
            ],
            [
                "nombre" => "Flexión declinada",
                "descripcion" => "1. Colócate en posición de plancha con los pies elevados en un banco o escalón. 2. Flexiona los codos y baja el cuerpo hasta que el pecho casi toque el suelo. 3. Vuelve a la posición inicial extendiendo los brazos."
            ],
            [
                "nombre" => "Flexión inclinada",
                "descripcion" => "1. Colócate en posición de plancha con las manos apoyadas en un banco o escalón. 2. Flexiona los codos y baja el cuerpo hasta que el pecho casi toque el suelo. 3. Vuelve a la posición inicial extendiendo los brazos."
            ],
            [
                "nombre" => "Flexión explosiva",
                "descripcion" => "1. Colócate en posición de plancha con las manos ligeramente más abiertas que el ancho de los hombros. 2. Realiza una flexión normal de forma explosiva, impulsándote con fuerza hacia arriba. 3. Vuelve a la posición inicial extendiendo los brazos."
            ],
        ];

        foreach ($ejercicios as $ejercicio) {
            $ejercicio['edad_min'] = rand(10, 40);
            $ejercicio['edad_max'] = rand($ejercicio['edad_min'], 80);
            $ejercicio['altura_min'] = rand(1.5, 1.9);
            $ejercicio['altura_max'] = rand($ejercicio['altura_min'], 2.3);
            $ejercicio['peso_min'] = rand(50, 90);
            $ejercicio['peso_max'] = rand($ejercicio['peso_min'], 130);
            $ejercicio['genero'] = rand(0, 1);
            $ejercicio['dificultad'] = rand(0, 2);
            $ejercicio['parte_cuerpo_id'] = rand(1, 9);
            $ejercicio['usuario_id'] = 1;
            Ejercicio::create($ejercicio);
        }
    }
}
