<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            [
                'nombre' => 'Subir de peso'
            ],
            [
                'nombre' => 'Bajar de peso'
            ],
            [
                'nombre' => 'Nutritivo'
            ],
            // [
            //     'nombre' => 'vegetariano'
            // ],
            // [
            //     'nombre' => 'vegano'
            // ],
        ];

        foreach ($tipos as $tipo) {
            Tipo::create($tipo);
        }
    }
}
