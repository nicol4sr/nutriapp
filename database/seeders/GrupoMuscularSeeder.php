<?php

namespace Database\Seeders;

use App\Models\GrupoMuscular;
use Illuminate\Database\Seeder;

class GrupoMuscularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = [
            [
                'nombre' => 'Biceps y triceps'
            ],
            [
                'nombre' => 'Pectorales'
            ],
            [
                'nombre' => 'Espalda'
            ],
            [
                'nombre' => 'Tren inferior'
            ],
            [
                'nombre' => 'Tren superior'
            ],
        ];

        foreach ($datos as $grupo) {
            GrupoMuscular::create($grupo);
        }
    }
}
