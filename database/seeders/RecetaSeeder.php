<?php

namespace Database\Seeders;

use App\Models\Comida;
use App\Models\Receta;
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
            ],
            [
                'nombre' => 'Yogurt chocolatado',
                'descripcion' => 'Una sabrosa mezcla láctea',
            ],
            [
                'nombre' => 'Arroz con chorizo',
                'descripcion' => 'Una rica receta',
            ],

            [
                "nombre" => "Arroz con pollo",
                "descripcion" => "Deliciosa receta de arroz con pollo",
            ],
            [
                "nombre" => "Spaghetti a la bolognesa",
                "descripcion" => "Clásica receta de spaghetti con salsa bolognesa",
            ],
            [
                "nombre" => "Ensalada César",
                "descripcion" => "Refrescante ensalada con pollo y aderezo César",
            ],
            [
                "nombre" => "Tacos de carne asada",
                "descripcion" => "Sabrosos tacos con carne asada y guarniciones",
            ],
            [
                "nombre" => "Sopa de lentejas",
                "descripcion" => "Caliente y nutritiva sopa de lentejas",
            ],
            [
                "nombre" => "Pasta Alfredo",
                "descripcion" => "Delicioso plato de pasta con salsa Alfredo",
            ],
            [
                "nombre" => "Hamburguesa clásica",
                "descripcion" => "La hamburguesa de siempre, con carne y queso",
            ],
            [
                "nombre" => "Pescado a la parrilla",
                "descripcion" => "Salmón a la parrilla con limón y hierbas",
            ],
            [
                "nombre" => "Ceviche de camarón",
                "descripcion" => "Refrescante ceviche de camarón con limón y cilantro",
            ],
            [
                "nombre" => "Pizza Margarita",
                "descripcion" => "La clásica pizza Margarita con tomate y mozzarella",
            ],
            [
                "nombre" => "Pollo a la naranja",
                "descripcion" => "Pollo agridulce con salsa de naranja",
            ],
            [
                "nombre" => "Sushi de salmón",
                "descripcion" => "Rollos de sushi con salmón fresco y arroz",
            ],
            [
                "nombre" => "Pastel de chocolate",
                "descripcion" => "Esponjoso pastel de chocolate con cobertura de ganache",
            ],
            [
                "nombre" => "Canelones de espinacas",
                "descripcion" => "Canelones rellenos de espinacas y ricota",
            ],
            [
                "nombre" => "Gazpacho andaluz",
                "descripcion" => "Refrescante sopa fría de tomate y pepino",
            ],
            [
                "nombre" => "Lasaña de carne",
                "descripcion" => "Deliciosa lasaña de carne molida y salsa de tomate",
            ],
            [
                "nombre" => "Tarta de manzana",
                "descripcion" => "Clásica tarta de manzana con masa quebrada",
            ],
            [
                "nombre" => "Sopa de pollo",
                "descripcion" => "Caliente y reconfortante sopa de pollo casera",
            ],
            [
                "nombre" => "Tacos de pescado",
                "descripcion" => "Tacos de pescado empanizado con aderezo de chipotle",
            ]
        ];

        $usuario = User::where('name', '=', 'Admin')->first();

        foreach ($recetas as $receta) {
            $tipo = Tipo::inRandomOrder()->first();
            $comida = Comida::inRandomOrder()->first();
            $receta['tipo_id'] = $tipo->id;
            $receta['comida_id'] = $comida->id;
            $receta['edad'] = rand(15, 60);
            $receta['genero'] = rand(0, 1);
            $registro = Receta::create($receta + ['usuario_id' => $usuario->first()->id]);
            $registro->alimentos()->limit(5)->get();
        }
    }
}
