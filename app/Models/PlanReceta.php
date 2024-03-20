<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanReceta extends Model
{
    use HasFactory;


    protected $fillable = ['nombre', 'tipo_id', 'comida_id', 'receta_id'];

    public function tipo()
    {
        return $this->hasOne(Tipo::class, 'id', 'tipo_id');
    }

    public function comida()
    {
        return $this->hasOne(Comida::class, 'id', 'comida_id');
    }

    public function receta()
    {
        return $this->hasOne(Receta::class, 'id', 'receta_id');
    }
}
