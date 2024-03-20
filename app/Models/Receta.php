<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'edad', 'genero', 'tipo_id', 'comida_id', 'usuario_id'];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function comida()
    {
        return $this->belongsTo(Comida::class);
    }

    public function alimentos()
    {
        return $this->belongsToMany(Nutricional::class, 'receta_alimento', 'receta_id', 'nutricional_id');
    }
}
