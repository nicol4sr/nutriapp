<?php

namespace Database\Seeders;

use App\Models\Comida;
use Illuminate\Database\Seeder;

class ComidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comidas = [
            [
                'nombre' => 'Desayuno',
            ],
            [
                'nombre' => 'Almuerzo'
            ],
            [
                'nombre' => 'Cena'
            ],
        ];

        foreach ($comidas as $comida) {
            Comida::create($comida);
        }
    }
}
