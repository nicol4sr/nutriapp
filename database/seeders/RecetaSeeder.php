<?php

namespace Database\Seeders;

use App\Models\Comida;
use App\Models\Receta;
use App\Models\RecetaAnterior;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recetas = [
            [
                'nombre' => 'Arroz con huevo',
                'descripcion' => 'Una rica receta',
                'edad' => 25,
                'genero' => 1,
            ],
            [
                'nombre' => 'Yogurt chocolatado',
                'descripcion' => 'Una sabrosa mezcla láctea',
                'edad' => 45,
                'genero' => 0,
            ],
            [
                'nombre' => 'Arroz con chorizo',
                'descripcion' => 'Una rica receta',
                'edad' => 20,
                'genero' => 0,
            ],
            [
                'nombre' => 'Test1',
                'descripcion' => 'Test1',
                'edad' => 15,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test2',
                'descripcion' => 'Test2',
                'edad' => 20,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test3',
                'descripcion' => 'Test3',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test4',
                'descripcion' => 'Test4',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test5',
                'descripcion' => 'Test5',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test6',
                'descripcion' => 'Test6',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test7',
                'descripcion' => 'Test7',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test8',
                'descripcion' => 'Test8',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test9',
                'descripcion' => 'Test9',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test10',
                'descripcion' => 'Test10',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test11',
                'descripcion' => 'Test11',
                'edad' => 30,
                'genero' => 1,
            ],
            [
                'nombre' => 'Test12',
                'descripcion' => 'Test12',
                'edad' => 17,
                'genero' => 0,
            ],
            [
                'nombre' => 'Test13',
                'descripcion' => 'Test13',
                'edad' => 30,
                'genero' => 0,
            ],
        ];

        $usuario = User::where('name', '=', 'Admin')->first();

        foreach ($recetas as $receta) {
            $tipo = Tipo::inRandomOrder()->first();
            $comida = Comida::inRandomOrder()->first();
            $receta['tipo_id'] = $tipo->id;
            $receta['comida_id'] = $comida->id;
            $registro = Receta::create($receta + ['usuario_id' => $usuario->first()->id]);
            $registro->alimentos()->limit(5)->get();
        }

        $recetasAnterior = [
            [
                'nombre' => 'Yogur griego con cereales y frutos secos',
                'descripcion' => ' El yogur griego, además de nutritivo, posee una textura cremosa muy agradable al paladar'
            ],
            [
                'nombre' => 'Pan integral con cereales, tortilla y brotes germi',
                'descripcion' => 'Te aportarán calorías llenas de proteínas y grasas no saturadas'
            ],
            [
                'nombre' => 'Requesón con fruta',
                'descripcion' => 'Un estupendo desayuno que te hará aumentar tu masa muscular'
            ],
            [
                'nombre' => 'Batido de cambur y avena',
                'descripcion' => 'Es una excelente alternativas para consumir en el desayuno'
            ],
            [
                'nombre' => 'Tostadas de pan integral con aguacate y queso fres',
                'descripcion' => 'Aportará a tu organismo calorías beneficiosas que te ayudarán a desarrollar tus músculos'
            ],
            [
                'nombre' => 'Avena, kiwi y semillas de chia',
                'descripcion' => 'Aporte calorico: 376,45 KCAL'
            ],
            [
                'nombre' => 'Tortillas de espinaca con bicote integral',
                'descripcion' => 'Aporte nutricional adecuado'
            ],
            [
                'nombre' => 'Batido con cambur y fresa',
                'descripcion' => 'Deliciosa receta para bajar de peso'
            ],
            [
                'nombre' => 'Avena con yogurt y frutos rojos',
                'descripcion' => 'Alto en fibras'
            ],
            [
                'nombre' => 'Tostadas de aguacate y germinados',
                'descripcion' => 'Rico en omega 3'
            ],
            [
                'nombre' => 'Burrito de guacamole',
                'descripcion' => 'Buena eleccion para nutrir'
            ],
            [
                'nombre' => 'Pan proteico con pavo natural y aguacate',
                'descripcion' => ' El pan de espelta, por sus beneficios, también es perfecto'
            ],
            [
                'nombre' => 'Estofado de pollo',
                'descripcion' => 'Estofado de pollo'
            ],
            [
                'nombre' => 'Pasta cremosa con pollo cajún',
                'descripcion' => 'Deliciosa receta proteica de pasta cremosa con pollo estilo cajún'
            ],
            [
                'nombre' => 'Ensalada de pollo con cuscús',
                'descripcion' => 'Esta ensalada templada es muy completa'
            ],
            [
                'nombre' => 'Atún salteado con verduras',
                'descripcion' => 'Este alimento contiene abundante omega 3'
            ],
            [
                'nombre' => 'Fiambre de pavo casero',
                'descripcion' => 'Sin duda, esta carne baja en grasas y calorías'
            ],
            [
                'nombre' => 'Abanico de calabacines al parmesano',
                'descripcion' => 'El calabacín es una verdura con grandes nutrientes'
            ],
            [
                'nombre' => 'Alcachofas con apio y manzanas',
                'descripcion' => 'Las alcachofas son una fuente de vitamina'
            ],
            [
                'nombre' => 'Brocoli con vinagreta de hortalizas',
                'descripcion' => 'Nutritivo en vitaminas'
            ],
            [
                'nombre' => 'Ensalada de papaya y tofu',
                'descripcion' => 'Las ensaladas frescas son la opción perfecta para una cena ligera'
            ],
            [
                'nombre' => 'Tortitas rellenas',
                'descripcion' => 'Receta de cena para ganar músculo'
            ],
            [
                'nombre' => 'Pasta cremosa con pollo cajún',
                'descripcion' => 'Deliciosa receta proteica de pasta cremosa con pollo estilo cajún'
            ],
            [
                'nombre' => 'Crema de verduras y guisantes',
                'descripcion' => 'Resultan saciantes y muy saludables'
            ],
            [
                'nombre' => 'Gazpacho y carne de ave',
                'descripcion' => 'La combinación es perfecta y la podremos digerir'
            ],
            [
                'nombre' => 'Pescado y piña asada',
                'descripcion' => 'El pescado es proteína animal baja en grasa'
            ],
            [
                'nombre' => 'Aguacate relleno',
                'descripcion' => 'Contine grasas naturales'
            ],
            [
                'nombre' => 'Sándwich de pollo asado con ensalada',
                'descripcion' => 'La combinación es perfecta'
            ],
            [
                'nombre' => 'Salmón con verduritas',
                'descripcion' => 'Nutritivo en vitaminas'
            ],
        ];

        foreach ($recetasAnterior as $receta) {
            RecetaAnterior::create($receta);
        }
    }
}
