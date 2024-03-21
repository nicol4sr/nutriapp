<?php

namespace Database\Seeders;

use App\Models\Nutricional;
use Illuminate\Database\Seeder;

class NutricionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valores_nutricionales = [
            [
                'nombre' => 'Leche chocolatada',
                'calorias' => 62,
                'hc' => 3,
                'proteinas' => 3,
                'grasas' => 1.1
            ],
            [
                'nombre' => 'Leche descremada en polvo',
                'calorias' => 36,
                'hc' => 5.1,
                'proteinas' => 3.5,
                'grasas' => 0.1
            ],
            [
                'nombre' => 'Leche entera',
                'calorias' => 57,
                'hc' => 4.5,
                'proteinas' => 3,
                'grasas' => 3
            ],
            [
                'nombre' => 'Leche entera azucarada',
                'calorias' => 79,
                'hc' => 10,
                'proteinas' => 3,
                'grasas' => 3
            ],
            [
                'nombre' => 'Leche descremada',
                'calorias' => 45,
                'hc' => 4.7,
                'proteinas' => 3.1,
                'grasas' => 1.5
            ],
            [
                'nombre' => 'Leche cultiv descremada',
                'calorias' => 32,
                'hc' => 4.3,
                'proteinas' => 3.6,
                'grasas' => 0.1
            ],
            [
                'nombre' => 'Leche cultiv entera/frutas',
                'calorias' => 89,
                'hc' => 14,
                'proteinas' => 3.5,
                'grasas' => 2.2
            ],
            [
                'nombre' => 'Yogur con cereales',
                'calorias' => 48,
                'hc' => 9,
                'proteinas' => 3,
                'grasas' => 0.05
            ],
            [
                'nombre' => 'Yema de huevo',
                'calorias' => 341,
                'hc' => 2,
                'proteinas' => 16,
                'grasas' => 29.2
            ],
            [
                'nombre' => 'Chorizo',
                'calorias' => 373,
                'hc' => 2,
                'proteinas' => 12.5,
                'grasas' => 31
            ],
            [
                'nombre' => 'Calabaza',
                'calorias' => 26,
                'hc' => 6.5,
                'proteinas' => 1,
                'grasas' => 0.1
            ],
            [
                'nombre' => 'Berenjena',
                'calorias' => 25,
                'hc' => 5.6,
                'proteinas' => 1.2,
                'grasas' => 0.2
            ],
            [
                'nombre' => 'Cebolla',
                'calorias' => 38,
                'hc' => 8.7,
                'proteinas' => 1.5,
                'grasas' => 0.1
            ],
            [
                'nombre' => 'Coliflor',
                'calorias' => 27,
                'hc' => 5.2,
                'proteinas' => 2.7,
                'grasas' => 0.2
            ],
            [
                'nombre' => 'Banana',
                'calorias' => 85,
                'hc' => 22.2,
                'proteinas' => 1.1,
                'grasas' => 0.2
            ],
            [
                'nombre' => 'Durazno',
                'calorias' => 52,
                'hc' => 13.3,
                'proteinas' => 0.8,
                'grasas' => 0.2
            ],
            [
                'nombre' => 'Arroz blanco',
                'calorias' => 343,
                'hc' => 78.6,
                'proteinas' => 6.7,
                'grasas' => 0.25
            ],
            [
                'nombre' => 'Trigo, harina',
                'calorias' => 345,
                'hc' => 74.5,
                'proteinas' => 9.5,
                'grasas' => 1.1
            ],
        ];

        foreach ($valores_nutricionales as $valor) {
            Nutricional::create($valor);
        }
    }
}
