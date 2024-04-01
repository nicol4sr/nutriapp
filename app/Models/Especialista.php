<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialista extends Model
{
    use HasFactory;

    protected $fillable = ['especialidad', 'nro_permiso', 'comprobante', 'cedula', 'validado', 'user_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
