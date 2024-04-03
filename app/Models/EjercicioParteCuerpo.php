<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EjercicioParteCuerpo extends Model
{
    use HasFactory;

    protected $table = "ejercicio_parte_cuerpo";
    protected $fillable = ['descripcion', 'ejercicio_id', 'parte_cuerpo_id'];

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class, 'id', 'ejercicio_id');
    }

    public function partes()
    {
        return $this->hasOne(PartesCuerpo::class, 'id', 'parte_cuerpo_id');
    }
}
