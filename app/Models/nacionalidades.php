<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nacionalidades extends Model
{
    use HasFactory;

    protected $fillable = ['pais', 'altura', 'peso', 'imc', 'alturaf', 'pesof', 'imcf'];
}
