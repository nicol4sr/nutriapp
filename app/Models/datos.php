<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datos extends Model
{
    use HasFactory;
    protected $table = 'datos';
    protected $fillable = [
        'usuario_id', 'nacionalidad_id', 'objetivo_id', 'habitos', 'genero', 'peso', 'altura', 'discapacidad', 'alergia', 'edad', 'nacimiento'
    ];

    public function objetivo()
    {
        return $this->hasOne(Tipo::class, 'id', 'objetivo_id');
    }

    public function nacionalidad()
    {
        return $this->hasOne(nacionalidades::class, 'id', 'nacionalidad_id');
    }
}
