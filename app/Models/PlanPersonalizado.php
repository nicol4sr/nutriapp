<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPersonalizado extends Model
{
    use HasFactory;

    protected $table = 'plan_personalizado';
    protected $fillable = [
        'nombre', 'descripcion', 'objetivo', 'horario', 'grupo_muscular_id'
    ];

    public function grupo_muscular()
    {
        return $this->hasOne(GrupoMuscular::class, 'id', 'grupo_muscular_id');
    }
}
