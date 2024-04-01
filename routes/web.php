<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\entrenadoresController;
use App\Http\Controllers\nutricionistasController;
use App\Http\Controllers\psicosController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\DatosFisicos;
use App\Http\Controllers\EspecialistaController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReferenciaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PreguntasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ---------------------------------------------------------------------------------
//                                  REVISAR
// ---------------------------------------------------------------------------------
Route::get('/tabla', [ReferenciaController::class, 'index'])
    ->name('valor_nutricional')
    ->middleware('check_user_answer_data_form');

// ---------------------------------------------------------------------------------
//                                  Inicio
// ---------------------------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'check_user_answer_data_form', 'prevent-back-history'])->name('home');

Auth::routes();

// ---------------------------------------------------------------------------------
//                             Recetas y Nutricional
// ---------------------------------------------------------------------------------
Route::controller(RecetaController::class)->group(function () {
    Route::get('/receta', 'index')
        ->name('receta')
        ->middleware('role:Nutricionista|Administrador|Entrenador');
    Route::get('/crear-receta', 'create')
        ->name('crear-receta')
        ->middleware('role:Nutricionista|Administrador|Entrenador');
    Route::post('/receta/store', 'store')
        ->name('guardar-receta')
        ->middleware('role:Nutricionista|Administrador|Entrenador');
    Route::get('/receta/{id}/edit', 'edit')
        ->name('editar-receta')
        ->middleware('role:Nutricionista|Administrador|Entrenador');
    Route::get('/receta/{id}/show', 'show')
        ->name('ver-receta');
    Route::put('/receta/{id}/update', 'update')
        ->name('actualizar-receta')
        ->middleware('role:Nutricionista|Administrador|Entrenador');
    Route::delete('/receta/{id}/delete', 'delete')
        ->name('borrar-receta')
        ->middleware('role:Nutricionista|Administrador|Entrenador');
    Route::get('/planes-nutricionales', 'planes_nutricionales')
        ->name('listado-planes');
    Route::get('/planes-nutricionales/publico/{tipo}', 'ver_plan')
        ->name('ver-planes');
    Route::get('/planes-nutricionales/personal', 'personal')
        ->name('mis-planes')
        ->middleware('role:Nutricionista|Administrador|Entrenador');
});

// ---------------------------------------------------------------------------------
//                                  Ejercicios
// ---------------------------------------------------------------------------------
Route::controller(EjercicioController::class)->group(function () {
    Route::get('/ejercicios', 'index')
        ->name('ejercicios');
    Route::get('/ejercicios/crear', 'create')
        ->name('crear-ejercicio');
    Route::get('/ejercicios/{ejercicio}/ver', 'show')
        ->name('ver-ejercicio');
    Route::post('/ejercicios/guardar', 'store')
        ->name('guardar-ejercicio');
    Route::get('/ejercicios/personal', 'personal')
        ->name('ejercicios-personal');
    Route::get('/ejercicios/publico/dificultad/{dificultad}', 'difficulty')
        ->name('ejercicios-dificultad');
    Route::get('/ejercicios/{ejercicio}/editar', 'edit')
        ->name('ejercicios-editar');
    Route::put('/ejercicios/{ejercicio}/actualizar', 'update')
        ->name('actualizar-ejercicio');
    Route::delete('/ejercicios/{ejercicio}/borrar', 'delete')
        ->name('borrar-ejercicio');
});

// ---------------------------------------------------------------------------------
//                                  Consultas
// ---------------------------------------------------------------------------------
Route::controller(ConsultaController::class)->group(function () {
    Route::get('/consultas', 'index')
        ->name('consultas.index');
    Route::get('/consultas/especialistas/{especialista}', 'select')
        ->name('consultas.select');
    Route::post('/consultas/especialistas', 'pick')
        ->name('consultas.pick');
    Route::get('/consultas/personal/{consulta}', 'show')
        ->name('consultas.show');
    Route::post('/consultas/especialista/{consulta}/{estado}', 'state')
        ->name('consultas.state');
    Route::get('/consultas/{consulta}/usuario/perfil', 'profile')
        ->name('consultas.profile');
    Route::put('/consultas/{consulta}/respuesta', 'response')
        ->name('consultas.response');
});

// ---------------------------------------------------------------------------------
//                                  Estadísticas físicas
// ---------------------------------------------------------------------------------
Route::get('/datos-fisicos', [DatosFisicos::class, 'index'])
    ->name('datos-fisicos');
Route::post('/datos-fisicos/store', [DatosFisicos::class, 'store'])
    ->name('datos-fisicos.store');
Route::delete('/datos-fisicos/{datoFisico}/delete', [DatosFisicos::class, 'delete'])
    ->name('datos-fisicos.delete');
Route::get('/datos-fisicos/pdf', [DatosFisicos::class, 'pdf'])
    ->name('datos-fisicos.pdf');


// ---------------------------------------------------------------------------------
//                             Datos del usuario
// ---------------------------------------------------------------------------------
Route::middleware(['role:Administrador'])->group(function () {
    Route::get('/preguntas', [PreguntasController::class, 'index'])
        ->name('preguntas');
    Route::post('/preguntas/store', [PreguntasController::class, 'store'])
        ->name('preguntas.store');
    Route::get('/preguntas/{pregunta}/edit', [PreguntasController::class, 'edit'])
        ->name('preguntas.edit');
    Route::put('/preguntas/{pregunta}/update', [PreguntasController::class, 'update'])
        ->name('preguntas.update');
    Route::delete('/preguntas/{pregunta}/delete', [PreguntasController::class, 'delete'])
        ->name('preguntas.delete');
});

Route::get('/preguntas/usuario', [PreguntasController::class, 'usuario'])
    ->name('preguntas.usuario')
    ->middleware(['role:Usuario']);
Route::post('/preguntas/usuario/store', [PreguntasController::class, 'usuario_store'])
    ->name('preguntas_usuario.store')
    ->middleware(['role:Usuario']);
Route::get('/preguntas/usuario/ver', [PreguntasController::class, 'usuario_show'])
    ->name('preguntas.usuario.show');
Route::put('/preguntas/usuario/actualizar', [PreguntasController::class, 'usuario_update'])
    ->name('preguntas_usuario.update')
    ->middleware(['role:Usuario']);

// ---------------------------------------------------------------------------------
//                                  Especialistas - REVISAR
// ---------------------------------------------------------------------------------
Route::controller(EspecialistaController::class)->group(function () {
    Route::get('/especialista/registro', 'index')->name('registro-especialista');
    Route::post('/especialista/registrar', 'store')->name('guardar-especialista');
    Route::get('/especialistas', 'pending')->name('pendiente-especialista');
    Route::put('/especialista/{especialista}/validar', 'validate_profile')->name('validar-especialista');
    Route::get('/especialista/{especialista}/perfil', 'profile')->name('perfil-especialista');
});

Route::controller(entrenadoresController::class)->group(function () {
    Route::get('/entrenador', 'index')->name('entrenador');
    Route::post('/entrenador/store', 'store')->name('guardar-p');
});

Route::controller(psicosController::class)->group(function () {
    Route::get('/editp', 'show')->name('editp');
    Route::get('/piscos', 'index')->name('psicos');
    Route::post('/psicos/store', 'store')->name('guardar-d');
});

Route::controller(nutricionistasController::class)->group(function () {

    Route::get('/nutricionistas', 'index')->name('nutricionistas');
    Route::post('/nutricionistas/store', 'store')->name('guardar-n');
});

// ---------------------------------------------------------------------------------
//                                  Configuracion
// ---------------------------------------------------------------------------------
Route::middleware('role:Administrador')->group(function () {
    Route::get('/respaldo', [ConfiguracionController::class, 'index'])
        ->name('respaldo');
    Route::get('/respaldo/guardar', [ConfiguracionController::class, 'guardar'])
        ->name('guardar-respaldo');
    Route::get('/respaldo/descargar/{archivo}', [ConfiguracionController::class, 'descargar'])
        ->name('descargar-respaldo');
});


// ---------------------------------------------------------------------------------
//                                  Perfil
// ---------------------------------------------------------------------------------
Route::controller(PerfilController::class)->group(function () {
    Route::get('/perfil', 'index')->name('perfil');
    Route::get('/perfil/editar', 'edit')->name('editar-perfil');
    Route::put('/perfil/actualizar', 'update')->name('actualizar-perfil');
    Route::get('/perfil/contraseña', 'password')->name('perfil-password');
    Route::put('/perfil/contraseña/actualizar', 'password_update')->name('actualizar-password');
});

// ---------------------------------------------------------------------------------
//                                  Notificaciones
// ---------------------------------------------------------------------------------
Route::get('/notificaciones/leidas', [NotificationController::class, 'marcar_todas'])
    ->name('notificaciones.leer');
Route::get('/notificaciones/{notificacion_id}/leida', [NotificationController::class, 'marcar_una'])
    ->name('notificacion.leer');
Route::get('/perfil/notificaciones', [NotificationController::class, 'ver_todas'])
    ->name('notificaciones');

// ---------------------------------------------------------------------------------
//                                  CONTRASEÑA
// ---------------------------------------------------------------------------------
Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLink'])
    ->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');
