<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ValorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valores = [
            [
                'nombre' => 'Leche chocolatada',
                'calorias' => 62,
                'carbohidratos' => 3,
                'proteinas' => 3,
                'grasas' => 1.1
            ],
            [
                'nombre' => 'Leche descremada en polvo',
                'calorias' => 36,
                'carbohidratos' => 5.1,
                'proteinas' => 3.5,
                'grasas' => 0.1
            ],
            [
                'nombre' => 'Leche entera',
                'calorias' => 57,
                'carbohidratos' => 4.5,
                'proteinas' => 3,
                'grasas' => 3
            ],
            [
                'nombre' => 'Leche entera azucarada',
                'calorias' => 79,
                'carbohidratos' => 10,
                'proteinas' => 3,
                'grasas' => 3
            ],
            [
                'nombre' => 'Leche descremada',
                'calorias' => 45,
                'carbohidratos' => 4.7,
                'proteinas' => 3.1,
                'grasas' => 1.5
            ],
            [
                'nombre' => 'Leche cultiv descremada',
                'calorias' => 32,
                'carbohidratos' => 4.3,
                'proteinas' => 3.6,
                'grasas' => 0.1
            ],
            [
                'nombre' => 'Leche cultiv entera/frutas',
                'calorias' => 89,
                'carbohidratos' => 14,
                'proteinas' => 3.5,
                'grasas' => 2.2
            ],
            [
                'nombre' => 'Yogur con cereales',
                'calorias' => 48,
                'carbohidratos' => 9,
                'proteinas' => 3,
                'grasas' => 0.05
            ],
            [
                'nombre' => 'Yogur con durazno',
                'calorias' => 48,
                'carbohidratos' => 9,
                'proteinas' => 3,
                'grasas' => 0.05
            ],[
                'nombre' => 'Yogur con fibras y frutas',
                'calorias' => 71,
                'carbohidratos' => 12,
                'proteinas' => 4.7,
                'grasas' => 0.2
            ],[
                'nombre' => 'Yogur con cereal azucar',
                'calorias' => 119,
                'carbohidratos' => 21,
                'proteinas' => 3.8,
                'grasas' => 2.2
            ],[
                'nombre' => 'Yogur descr. saborizado',
                'calorias' => 34.5,
                'carbohidratos' => 4.4,
                'proteinas' => 3.6,
                'grasas' => 0.05
            ],[
                'nombre' => 'Yogur descr. y All  Bran',
                'calorias' => 75,
                'carbohidratos' => 12.5,
                'proteinas' => 5.1,
                'grasas' => 0.4
            ],[
                'nombre' => 'Yogur descr. con frutas',
                'calorias' => 48,
                'carbohidratos' => 9,
                'proteinas' => 2.8,
                'grasas' => 0.03
            ],[
                'nombre' => 'Yogur descr. y corn flakes',
                'calorias' => 63,
                'carbohidratos' => 11.4,
                'proteinas' => 4.2,
                'grasas' => 0.04
            ],
            [
                'nombre' => 'Queso ¨Philadelphia¨ ligth',
                'calorias' => 200,
                'carbohidratos' => 6.6,
                'proteinas' => 10,
                'grasas' => 16.6
            ],
            [
                'nombre' => 'Queso Blanco diet',
                'calorias' => 100,
                'carbohidratos' => 7.4,
                'proteinas' => 9.9,
                'grasas' => 3.5
            ],
            [
                'nombre' => 'Queso camembert-brie',
                'calorias' => 527,
                'carbohidratos' => 0,
                'proteinas' => 26.7,
                'grasas' => 29.7
            ],
            [
                'nombre' => 'Queso cheddar Argentino',
                'calorias' => 374,
                'carbohidratos' => 0,
                'proteinas' => 26,
                'grasas' => 30
            ],
            [
                'nombre' => 'Queso chubut',
                'calorias' => 328,
                'carbohidratos' => 0,
                'proteinas' => 25.9,
                'grasas' => 24.9
            ],
            [
                'nombre' => 'Queso cottage',
                'calorias' => 95,
                'carbohidratos' => 2,
                'proteinas' => 11.4,
                'grasas' => 4.5
            ],
            [
                'nombre' => 'Queso crema',
                'calorias' => 245,
                'carbohidratos' => 3.7,
                'proteinas' => 8.2,
                'grasas' => 22
            ],
            [
                'nombre' => 'Queso cremoso',
                'calorias' => 305,
                'carbohidratos' => 1.3,
                'proteinas' => 18.7,
                'grasas' => 25
            ],
            [
                'nombre' => 'Queso cuartirolo',
                'calorias' => 273,
                'carbohidratos' => 0,
                'proteinas' => 21,
                'grasas' => 21
            ],
            [
                'nombre' => 'Queso dambo',
                'calorias' => 356,
                'carbohidratos' => 0,
                'proteinas' => 26,
                'grasas' => 28
            ],
            [
                'nombre' => 'Queso de cabra',
                'calorias' => 173,
                'carbohidratos' => 3.7,
                'proteinas' => 16,
                'grasas' => 10.3
            ],
            [
                'nombre' => 'Queso de maquina',
                'calorias' => 250,
                'carbohidratos' => 1.9,
                'proteinas' => 16.5,
                'grasas' => 17.2
            ],
            [
                'nombre' => 'Queso edam',
                'calorias' => 345,
                'carbohidratos' => 26,
                'proteinas' => 22,
                'grasas' => 27
            ],
            [
                'nombre' => 'Queso edam diet',
                'calorias' => 268,
                'carbohidratos' => 1,
                'proteinas' => 30,
                'grasas' => 16
            ],
            [
                'nombre' => 'Queso emmenthal',
                'calorias' => 403,
                'carbohidratos' => 0.5,
                'proteinas' => 27.8,
                'grasas' => 28.2
            ],
            [
                'nombre' => 'Queso fiambrin',
                'calorias' => 334,
                'carbohidratos' => 1.2,
                'proteinas' => 17,
                'grasas' => 29
            ],
            [
                'nombre' => 'Queso fontina',
                'calorias' => 369,
                'carbohidratos' => 0,
                'proteinas' => 27,
                'grasas' => 29
            ],
            [
                'nombre' => 'Queso fresco',
                'calorias' => 307,
                'carbohidratos' => 1,
                'proteinas' => 24,
                'grasas' => 23
            ],
            [
                'nombre' => 'Queso fresco diet',
                'calorias' => 230,
                'carbohidratos' => 1,
                'proteinas' => 24,
                'grasas' => 15
            ],
            [
                'nombre' => 'Queso fundido untable',
                'calorias' => 285,
                'carbohidratos' => 2.9,
                'proteinas' => 10,
                'grasas' => 25.9
            ],
            [
                'nombre' => 'Queso fymbo',
                'calorias' => 348,
                'carbohidratos' => 0,
                'proteinas' => 24,
                'grasas' => 28
            ],
            [
                'nombre' => 'Queso gruyere',
                'calorias' => 357,
                'carbohidratos' => 10,
                'proteinas' => 28,
                'grasas' => 26
            ],
            [
                'nombre' => 'Queso holanda',
                'calorias' => 360,
                'carbohidratos' => 0,
                'proteinas' => 24,
                'grasas' => 28
            ],
            [
                'nombre' => 'Queso mar de plata',
                'calorias' => 400,
                'carbohidratos' => 0,
                'proteinas' => 24,
                'grasas' => 26
            ],
            [
                'nombre' => 'Queso minifymbo',
                'calorias' => 343,
                'carbohidratos' => 0,
                'proteinas' => 25,
                'grasas' => 27
            ],
            [
                'nombre' => 'Queso mozarella',
                'calorias' => 334,
                'carbohidratos' => 0,
                'proteinas' => 24,
                'grasas' => 26
            ],
            [
                'nombre' => 'Queso neufchatel',
                'calorias' => 237,
                'carbohidratos' => 2.2,
                'proteinas' => 9.8,
                'grasas' => 21
            ],
            [
                'nombre' => 'Queso parmesano',
                'calorias' => 393,
                'carbohidratos' => 2.9,
                'proteinas' => 36,
                'grasas' => 26
            ],
            [
                'nombre' => 'Queso pategras',
                'calorias' => 365,
                'carbohidratos' => 0,
                'proteinas' => 26,
                'grasas' => 29
            ],[
                'nombre' => 'Queso petit suisse',
                'calorias' => 165,
                'carbohidratos' => 3.5,
                'proteinas' => 7.5,
                'grasas' => 13
            ],[
                'nombre' => 'Queso port salut',
                'calorias' => 295,
                'carbohidratos' => 0,
                'proteinas' => 22,
                'grasas' => 23
            ],[
                'nombre' => 'Queso port salut diet',
                'calorias' => 214,
                'carbohidratos' => 0.5,
                'proteinas' => 26,
                'grasas' => 12
            ],[
                'nombre' => 'Queso provolone',
                'calorias' => 392,
                'carbohidratos' => 0,
                'proteinas' => 30.5,
                'grasas' => 30
            ],
            [
                'nombre' => 'Queso rallado',
                'calorias' => 427,
                'carbohidratos' => 0,
                'proteinas' => 42.5,
                'grasas' => 28.5
            ],
            [
                'nombre' => 'Queso reggiatino',
                'calorias' => 334,
                'carbohidratos' => 0,
                'proteinas' => 34,
                'grasas' => 22
            ],[
                'nombre' => 'Queso ricotta',
                'calorias' => 185,
                'carbohidratos' => 2.5,
                'proteinas' => 14.5,
                'grasas' => 13
            ],[
                'nombre' => 'Queso ricotta descr.',
                'calorias' => 105,
                'carbohidratos' => 2,
                'proteinas' => 13,
                'grasas' => 5
            ],[
                'nombre' => 'Queso roquefort',
                'calorias' => 346,
                'carbohidratos' => 0,
                'proteinas' => 20,
                'grasas' => 31
            ],[
                'nombre' => 'Queso sardo',
                'calorias' => 367,
                'carbohidratos' => 0,
                'proteinas' => 31,
                'grasas' => 27
            ],[
                'nombre' => 'Queso tilsit diet',
                'calorias' => 270,
                'carbohidratos' => 1,
                'proteinas' => 30,
                'grasas' => 27
            ],
            [
                'nombre' => 'Queso tofu',
                'calorias' => 134,
                'carbohidratos' => 1,
                'proteinas' => 13,
                'grasas' => 9
            ],
            [
                'nombre' => 'Yema de huevo',
                'calorias' => 341,
                'carbohidratos' => 2,
                'proteinas' => 16,
                'grasas' => 29.2
            ],
            [
                'nombre' => 'Huevo de codorniz',
                'calorias' => 179,
                'carbohidratos' => 3.6,
                'proteinas' => 11.6,
                'grasas' => 13.1
            ],
            [
                'nombre' => 'Bife angosto',
                'calorias' => 182,
                'carbohidratos' => 0,
                'proteinas' => 20.8,
                'grasas' => 10.3
            ],
            [
                'nombre' => 'Lomo de res',
                'calorias' => 303,
                'carbohidratos' => 0,
                'proteinas' => 17.4,
                'grasas' => 25.3
            ],
            [
                'nombre' => 'Hamburguesa',
                'calorias' => 230,
                'carbohidratos' => 0.5,
                'proteinas' => 14,
                'grasas' => 18.3
            ],
            [
                'nombre' => 'Hamburguesa diet',
                'calorias' => 112,
                'carbohidratos' => 2.4,
                'proteinas' => 17,
                'grasas' => 3.6
            ],
            [
                'nombre' => 'Lomo semigordo',
                'calorias' => 241,
                'carbohidratos' => 0,
                'proteinas' => 18.5,
                'grasas' => 17.9
            ],
            [
                'nombre' => 'lomo magro',
                'calorias' => 148,
                'carbohidratos' => 0,
                'proteinas' => 20.7,
                'grasas' => 6.5
            ],
            [
                'nombre' => 'Tapa de asado c/grasa',
                'calorias' => 325,
                'carbohidratos' => 0,
                'proteinas' => 16.63,
                'grasas' => 28.15
            ],
            [
                'nombre' => 'Tapa de asado magra',
                'calorias' => 154,
                'carbohidratos' => 0,
                'proteinas' => 20.75,
                'grasas' => 7.28
            ],
            [
                'nombre' => 'Tira de asado',
                'calorias' => 401,
                'carbohidratos' => 0,
                'proteinas' => 14.8,
                'grasas' => 37.4
            ],
            [
                'nombre' => 'Tira de asado magro',
                'calorias' => 193,
                'carbohidratos' => 0,
                'proteinas' => 20.7,
                'grasas' => 11.6
            ],
            [
                'nombre' => 'Vacio de res',
                'calorias' => 144,
                'carbohidratos' => 0,
                'proteinas' => 21.6,
                'grasas' => 5.7
            ],
            [
                'nombre' => 'Carne de cerdo gorda',
                'calorias' => 346,
                'carbohidratos' => 0,
                'proteinas' => 14.6,
                'grasas' => 31.4
            ],
            [
                'nombre' => 'Carne de cerdo magra',
                'calorias' => 276,
                'carbohidratos' => 0,
                'proteinas' => 16.7,
                'grasas' => 22.7
            ],
            [
                'nombre' => 'Chivo',
                'calorias' => 165,
                'carbohidratos' => 0,
                'proteinas' => 18.7,
                'grasas' => 9.4
            ],
            [
                'nombre' => 'Ciervo',
                'calorias' => 120,
                'carbohidratos' => 0,
                'proteinas' => 22.9,
                'grasas' => 2.4
            ],
            [
                'nombre' => 'Liebre',
                'calorias' => 135,
                'carbohidratos' => 0,
                'proteinas' => 21,
                'grasas' => 5
            ],
            [
                'nombre' => 'Carne de conejo',
                'calorias' => 156,
                'carbohidratos' => 0,
                'proteinas' => 20.3,
                'grasas' => 7.7
            ],
            [
                'nombre' => 'Chinchulines de vaca',
                'calorias' => 98,
                'carbohidratos' => 0,
                'proteinas' => 14.5,
                'grasas' => 3.9
            ],
            [
                'nombre' => 'Higado de vaca',
                'calorias' => 134,
                'carbohidratos' => 3.6,
                'proteinas' => 19.8,
                'grasas' => 3.9
            ],
            [
                'nombre' => 'Lengua de vaca',
                'calorias' => 191,
                'carbohidratos' => 0.9,
                'proteinas' => 16,
                'grasas' => 13.2
            ],
            [
                'nombre' => 'Molleja de vaca',
                'calorias' => 229,
                'carbohidratos' => 0,
                'proteinas' => 14.4,
                'grasas' => 19
            ],
            [
                'nombre' => 'mondongo de vaca',
                'calorias' => 90,
                'carbohidratos' => 1,4,
                'proteinas' => 14,
                'grasas' => 2.7
            ],
            [
                'nombre' => 'Riñon de vaca',
                'calorias' => 124,
                'carbohidratos' => 1.8,
                'proteinas' => 16.8,
                'grasas' => 5
            ],
            [
                'nombre' => 'Bondiola',
                'calorias' => 353,
                'carbohidratos' => 0,
                'proteinas' => 21,
                'grasas' => 30
            ],
            [
                'nombre' => 'Chorizo',
                'calorias' => 373,
                'carbohidratos' => 2,
                'proteinas' => 12.5,
                'grasas' => 31
            ],
            [
                'nombre' => 'Jamon cocido',
                'calorias' => 126,
                'carbohidratos' => 3,
                'proteinas' => 20,
                'grasas' => 4
            ],
            [
                'nombre' => 'Jamon crudo',
                'calorias' => 296,
                'carbohidratos' => 0,
                'proteinas' => 25.8,
                'grasas' => 20.6
            ],
            [
                'nombre' => 'Lomo',
                'calorias' => 153,
                'carbohidratos' => 3,
                'proteinas' => 23,
                'grasas' => 5
            ],
            [
                'nombre' => 'Mortadela',
                'calorias' => 309,
                'carbohidratos' => 4,
                'proteinas' => 17,
                'grasas' => 25
            ],
            [
                'nombre' => 'Paleta',
                'calorias' => 121,
                'carbohidratos' => 3,
                'proteinas' => 16,
                'grasas' => 5
            ],
            [
                'nombre' => 'Panceta ahumada',
                'calorias' => 558,
                'carbohidratos' => 9,
                'proteinas' => 58,
                'grasas' => 31
            ],
            [
                'nombre' => 'Pastrami',
                'calorias' => 125,
                'carbohidratos' => 2,
                'proteinas' => 18,
                'grasas' => 5
            ],
            [
                'nombre' => 'Leberwurst',
                'calorias' => 294,
                'carbohidratos' => 3,
                'proteinas' => 21,
                'grasas' => 22
            ],
            [
                'nombre' => 'Picadilo de carne',
                'calorias' => 182,
                'carbohidratos' => 3.3,
                'proteinas' => 12,
                'grasas' => 13.5
            ],
            [
                'nombre' => 'Salamin',
                'calorias' => 325,
                'carbohidratos' => 0,
                'proteinas' => 13.9,
                'grasas' => 10.5
            ],
            [
                'nombre' => 'Salchicha de viena',
                'calorias' => 269,
                'carbohidratos' => 4.6,
                'proteinas' => 12,
                'grasas' => 22.5
            ],
            [
                'nombre' => 'Salchicha de viena diet',
                'calorias' => 150,
                'carbohidratos' => 0,
                'proteinas' => 13.9,
                'grasas' => 10.5
            ],
            [
                'nombre' => 'Hamburguesa de pollo',
                'calorias' => 153,
                'carbohidratos' => 1.8,
                'proteinas' => 19.1,
                'grasas' => 7.7
            ],
            [
                'nombre' => 'Carne de pavo',
                'calorias' => 268,
                'carbohidratos' => 0.5,
                'proteinas' => 20,
                'grasas' => 20.1
            ],
            [
                'nombre' => 'Pavita',
                'calorias' => 163,
                'carbohidratos' => 0,
                'proteinas' => 21.7,
                'grasas' => 6.5
            ],
            [
                'nombre' => 'Carne de pollo',
                'calorias' => 170,
                'carbohidratos' => 0,
                'proteinas' => 18.2,
                'grasas' => 10.3
            ],
            [
                'nombre' => 'Menudos de pollo',
                'calorias' => 103,
                'carbohidratos' => 0.1,
                'proteinas' => 17.5,
                'grasas' => 3.1
            ],
            [
                'nombre' => 'Bacalao',
                'calorias' => 77,
                'carbohidratos' => 0,
                'proteinas' => 17.5,
                'grasas' => 0.3
            ],
            [
                'nombre' => 'Brotola',
                'calorias' => 84,
                'carbohidratos' => 0,
                'proteinas' => 16.7,
                'grasas' => 0.8
            ],
            [
                'nombre' => 'Caballa',
                'calorias' => 165,
                'carbohidratos' => 0,
                'proteinas' => 21.3,
                'grasas' => 8.2
            ],
            [
                'nombre' => 'Lenguado',
                'calorias' => 87,
                'carbohidratos' => 0,
                'proteinas' => 19,
                'grasas' => 0.5
            ],
            [
                'nombre' => 'Merluza',
                'calorias' => 90,
                'carbohidratos' => 0,
                'proteinas' => 19.3,
                'grasas' => 0.8
            ],
            [
                'nombre' => 'Pejerrey',
                'calorias' => 87,
                'carbohidratos' => 0,
                'proteinas' => 18.8,
                'grasas' => 0.9
            ],
            [
                'nombre' => 'Salmon rosado',
                'calorias' => 99,
                'carbohidratos' => 0,
                'proteinas' => 16.95,
                'grasas' => 2.93
            ],
            [
                'nombre' => 'Surubí',
                'calorias' => 191,
                'carbohidratos' => 0.9,
                'proteinas' => 16,
                'grasas' => 13.2
            ],
            [
                'nombre' => 'Anchoas',
                'calorias' => 175,
                'carbohidratos' => 0,
                'proteinas' => 11.7,
                'grasas' => 10
            ],
            [
                'nombre' => 'Arenque en salmuera',
                'calorias' => 219,
                'carbohidratos' => 0,
                'proteinas' => 21,
                'grasas' => 15
            ],
            [
                'nombre' => 'Atun en aceite',
                'calorias' => 288,
                'carbohidratos' => 0,
                'proteinas' => 24.2,
                'grasas' => 20.5
            ],
            [
                'nombre' => 'Atun en agua',
                'calorias' => 127,
                'carbohidratos' => 0,
                'proteinas' => 28,
                'grasas' => 0.8
            ],
            [
                'nombre' => 'Caviar en lata',
                'calorias' => 262,
                'carbohidratos' => 3.3,
                'proteinas' => 26.9,
                'grasas' => 15
            ],
            [
                'nombre' => 'Kani-Kama',
                'calorias' => 80,
                'carbohidratos' => 0,
                'proteinas' => 10.5,
                'grasas' => 0.3
            ],
            [
                'nombre' => 'Sardina es aceite',
                'calorias' => 283,
                'carbohidratos' => 0.9,
                'proteinas' => 16,
                'grasas' => 13.2
            ],
            
            [
                'nombre' => 'Calabaza',
                'calorias' => 26,
                'carbohidratos' => 6.5,
                'proteinas' => 1,
                'grasas' => 0.1
            ],
            [
                'nombre' => 'Berenjena',
                'calorias' => 25,
                'carbohidratos' => 5.6,
                'proteinas' => 1.2,
                'grasas' => 0.2
            ],
            [
                'nombre' => 'Cebolla',
                'calorias' => 38,
                'carbohidratos' => 8.7,
                'proteinas' => 1.5,
                'grasas' => 0.1
            ],
            [
                'nombre' => 'Coliflor',
                'calorias' => 27,
                'carbohidratos' => 5.2,
                'proteinas' => 2.7,
                'grasas' => 0.2
            ],
            [
                'nombre' => 'Banana',
                'calorias' => 85,
                'carbohidratos' => 22.2,
                'proteinas' => 1.1,
                'grasas' => 0.2
            ],
            [
                'nombre' => 'Durazno',
                'calorias' => 52,
                'carbohidratos' => 13.3,
                'proteinas' => 0.8,
                'grasas' => 0.2
            ],
            [
                'nombre' => 'Arroz blanco',
                'calorias' => 343,
                'carbohidratos' => 78.6,
                'proteinas' => 6.7,
                'grasas' => 0.25
            ],
            [
                'nombre' => 'Trigo, harina',
                'calorias' => 345,
                'carbohidratos' => 74.5,
                'proteinas' => 9.5,
                'grasas' => 1.1
            ],
        ];

        foreach ($valores as $valor) {
            Nutricional::create($valor);
        }
    }
}
