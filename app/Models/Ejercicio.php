<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicio';

    protected $fillable = ['nombre', 'dificultad', 'descripcion', 'edad_min', 'edad_max', 'genero', 'altura_min', 'altura_max', 'peso_min', 'peso_max', 'usuario_id'];

    public function ejercicio_partes()
    {
        return $this->hasMany(EjercicioParteCuerpo::class, 'ejercicio_id', 'id');
    }
}
