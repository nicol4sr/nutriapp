<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    use HasFactory;
    protected $fillable = ['respuesta', 'pregunta_id', 'usuario_id'];

    public function pregunta()
    {
        return $this->hasOne(Pregunta::class, 'id', 'pregunta_id');
    }
}
