<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'especialista_id', 'estado', 'respuesta'];

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'usuario_id');
    }

    public function especialista()
    {
        return $this->hasOne(User::class, 'id', 'especialista_id');
    }
}
