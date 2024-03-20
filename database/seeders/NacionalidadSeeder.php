<?php

namespace Database\Seeders;

use App\Models\nacionalidades;
use Illuminate\Database\Seeder;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nacionalidades = [
            [
                'pais' => 'Argentina',
                'altura' => '1,74 m',
                'peso' => '84,7 kg',
                'imc' => 26.7,
                'alturaf' => '1,61 m',
                'pesof' => '71,4 kg',
                'imcf' => 26.6
            ],
            [
                'pais' => 'Bolivia',
                'altura' => '1,68 m',
                'peso' => '71,2 kg',
                'imc' => 25.3,
                'alturaf' => '1,55 m',
                'pesof' => '66,8 kg',
                'imcf' => 27.7
            ],
            [
                'pais' => 'Brasil',
                'altura' => '1,75 m',
                'peso' => '80,7 kg',
                'imc' => 26.3,
                'alturaf' => '1,62 m',
                'pesof' => '70,3 kg',
                'imcf' => 26.8
            ],
            [
                'pais' => 'Chile',
                'altura' => '1,73 m',
                'peso' => '82,8 kg',
                'imc' => 27.8,
                'alturaf' => '1,59 m',
                'pesof' => '71,5 kg',
                'imcf' => 28.2
            ],
            [
                'pais' => 'Colombia',
                'altura' => '1,71 m',
                'peso' => '80,9 kg',
                'imc' => 25.8,
                'alturaf' => '1,58 m',
                'pesof' => '66,4 kg',
                'imcf' => 26.7
            ],
            [
                "pais" => "Costa rica ",
                "altura" => "1,74 m",
                "peso" => "80,9 kg",
                "imc" => 26.8,
                "alturaf" => "1,60 m",
                "pesof" => "71,7 kg",
                "imcf" => 28.0,
            ],
            [
                "pais" => "Cuba",
                "altura" => "1,73 m",
                "peso" => "76,0 kg",
                "imc" => 25.3,
                "alturaf" => "1,60 m",
                "pesof" => "66,8 kg",
                "imcf" => 26.1,
            ],
            [
                "pais" => "Ecuador",
                "altura" => "1,67 m",
                "peso" => "74,2 kg",
                "imc" => 26.6,
                "alturaf" => "1,55 m",
                "pesof" => "66,9 kg",
                "imcf" => 27.9,
            ],
            [
                "pais" => "El salvador",
                "altura" => "1,70 m",
                "peso" => "77,8 kg",
                "imc" => 26.9,
                "alturaf" => "1,56 m",
                "pesof" => "68,8 kg",
                "imcf" => 28.3,
            ],
            [
                "pais" => "Guatemala",
                "altura" => "1,64 m",
                "peso" => "69,1 kg",
                "imc" => 25.7,
                "alturaf" => "1,51 m",
                "pesof" => "61,9 kg",
                "imcf" => 27.3,
            ],
            [
                "pais" => "Haití",
                "altura" => "1,72 m",
                "peso" => "78,0 kg",
                "imc" => 26.4,
                "alturaf" => "1,60 m",
                "pesof" => "62,1 kg",
                "imcf" => 24.2,

            ],
            [
                "pais" => "Honduras",
                "altura" => "1,69 m",
                "peso" => "74,0 kg",
                "imc" => 25.9,
                "alturaf" => "1,55 m",
                "pesof" => "66,2 kg",
                "imcf" => 27.6,
            ],
            [
                "pais" => "México ",
                "altura" => "1,70 m",
                "peso" => "79,3 kg",
                "imc" => 27.5,
                "alturaf" => "1,57 m",
                "pesof" => "70,7 kg",
                "imcf" => 28.5,
            ],
            [
                "pais" => "Nicaragua",
                "altura" => "1,69 m",
                "peso" => "76,4 kg",
                "imc" => 26.6,
                "alturaf" => "1,55 m",
                "pesof" => "67,6 kg",
                "imcf" => 28.0,
            ],
            [
                "pais" => "Panama",
                "altura" => "1,70 m",
                "peso" => "75,5 kg",
                "imc" => 26.2,
                "alturaf" => "1,58 m",
                "pesof" => "68,9 kg",
                "imcf" => 27.7,
            ],
            [
                "pais" => "Paraguay",
                "altura" => "1,73 m",
                "peso" => "79,4 kg",
                "imc" => 26.5,
                "alturaf" => "1,59 m",
                "pesof" => "68,4 kg",
                "imcf" => 26.9,
            ],
            [
                "pais" => "Peru",
                "altura" => "1,66 m",
                "peso" => "72,3 kg",
                "imc" => 26.2,
                "alturaf" => "1,54 m",
                "pesof" => "64,3 kg",
                "imcf" => 27.1,
            ],
            [
                "pais" => "República Dominicana",
                "altura" => "1,74 m",
                "peso" => "77,6 kg",
                "imc" => 25.6,
                "alturaf" => "1,61 m",
                "pesof" => "70,9 kg",
                "imcf" => 27.4,
            ],
            [
                "pais" => "Uruguay",
                "altura" => "1,74 m",
                "peso" => "82,7 kg",
                "imc" => 27.3,
                "alturaf" => "1,61 m",
                "pesof" => "71,3 kg",
                "imcf" => 27.4,
            ],
            [
                'pais' => 'Venezuela',
                'altura' => '1,73 m',
                'peso' => '79,8 kg',
                'imc' => 26.7,
                'alturaf' => '1,60 m',
                'pesof' => '68,5 kg',
                'imcf' => 26.9
            ],
        ];

        foreach ($nacionalidades as $nacionalidad) {
            nacionalidades::create($nacionalidad);
        }
    }
}
