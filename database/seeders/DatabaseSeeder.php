<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            TipoSeeder::class,
            NacionalidadSeeder::class,
            PreguntasSeeder::class,
            RolSeeder::class,
            UsuarioSeeder::class,
            NutricionalSeeder::class,
            ComidaSeeder::class,
            RecetaSeeder::class,
            GrupoMuscularSeeder::class,
            PlanesAlimenticiosSeeder::class,
            PartesCuerpoSeeder::class,
            EjercicioSeeder::class,
            
        ]);
    }
}
