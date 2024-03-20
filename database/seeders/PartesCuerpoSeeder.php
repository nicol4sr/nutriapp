<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartesCuerpo;

class PartesCuerpoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partes = ["Piernas", "Glúteos", "Hombros", "Abdomen", "Espalda", "Bíceps", "Tríceps", "Pectoral", "Bíceps y tríceps"];

        foreach ($partes as $parte) {
            PartesCuerpo::create([
                'nombre' => $parte
            ]);
        }
    }
}
