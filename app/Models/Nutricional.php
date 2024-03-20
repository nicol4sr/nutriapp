<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutricional extends Model
{
    use HasFactory;

    public function recetas()
    {
        return $this->belongsToMany(Receta::class, 'receta_alimento', 'nutricional_id', 'receta_id');
    }
}
