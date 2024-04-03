<?php

namespace App\Models;

use App\Notifications\SendEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'genero',
        'fecha_nacimiento',
        'nacionalidad_id',
        'objetivo_id',
        'habitos',
        'altura'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'email_blocked_at' => 'datetime'
    ];

    public function especialista()
    {
        return $this->hasOne(Especialista::class);
    }

    public function nacionalidad()
    {
        return $this->hasOne(nacionalidades::class, 'id', 'nacionalidad_id');
    }

    public function objetivo()
    {
        return $this->hasOne(Tipo::class, 'id', 'objetivo_id');
    }

    public function respuestas()
    {
        return $this->hasMany(DatosUsuario::class, 'usuario_id', 'id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'usuario_id', 'id');
    }

    public function sendPasswordResetNotification($token)
    {
        $url = url('/reset-password/' . $token);

        $this->notify(new SendEmail($url));
    }
}
