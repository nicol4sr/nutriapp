<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datos extends Model
{
    use HasFactory;
    protected $table = 'datos';
    protected $fillable = [
        'objetivo', 'habitos', 'genero', 'pesoi', 'altura', 'imc', 'discapacidad', 'alergia', 'nacionalidad', 'edad'
    ];

    public function nacionalidades()
    {
        return $this->hasOne(nacionalidades::class, 'id', 'nacionalidad');
    }
}
