<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoFisico extends Model
{
    use HasFactory;

    protected $table = 'datos_fisicos';
    protected $fillable = ['peso', 'usuario_id'];
}
