<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicio';

    protected $fillable = ['nombre', 'dificultad', 'descripcion', 'edad_min', 'edad_max', 'genero', 'altura_min', 'altura_max', 'peso_min', 'peso_max', 'parte_cuerpo_id', 'usuario_id'];


    public function cuerpo()
    {
        return $this->hasOne(PartesCuerpo::class, 'id', 'parte_cuerpo_id');
    }
}
