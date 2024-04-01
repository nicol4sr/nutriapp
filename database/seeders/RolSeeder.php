<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Entrenador']);
        Role::create(['name' => 'Nutricionista']);
        Role::create(['name' => 'Psicologo']);
        Role::create(['name' => 'Usuario']);
    }
}
