<?php

use App\Http\Controllers\entrenadoresController;
use App\Http\Controllers\nutricionistasController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\psicosController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\ValorController;
use App\Http\Controllers\datosController;
use App\Http\Controllers\EspecialistaController;
use App\Http\Controllers\ReferenciaController;
use App\Http\Controllers\nacionalidadController;
use App\Http\Controllers\RecetarioController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('home');

Auth::routes();

Route::get('/perfil', function () {
    return view('profile.profile');
})->name('perfil');

// Ejercicios
Route::controller(EjercicioController::class)->group(function () {
    Route::get('/ejercicios', 'index')->name('ejercicios');
    Route::get('/ejercicios/crear', 'create')->name('crear-ejercicio');
    Route::get('/ejercicios/{ejercicio}/ver', 'show')->name('ver-ejercicio');
    Route::post('/ejercicios/guardar', 'store')->name('guardar-ejercicio');
    Route::get('/ejercicios/personal', 'personal')->name('ejercicios-personal');
    Route::get('/ejercicios/publico/dificultad/{dificultad}', 'difficulty')->name('ejercicios-dificultad');
    Route::get('/ejercicios/{ejercicio}/editar', 'edit')->name('ejercicios-editar');
    Route::put('/ejercicios/{ejercicio}/actualizar', 'update')->name('actualizar-ejercicio');
    Route::delete('/ejercicios/{ejercicio}/borrar', 'delete')->name('borrar-ejercicio');
});

// Recetas & Nutricional
Route::controller(RecetaController::class)->group(function () {
    Route::get('/receta', 'index')->name('receta');
    Route::get('/crear-receta', 'create')->name('crear-receta');
    Route::post('/receta/store', 'store')->name('guardar-receta');
    Route::get('/receta/{id}/edit', 'edit')->name('editar-receta');
    Route::get('/receta/{id}/show', 'show')->name('ver-receta');
    Route::put('/receta/{id}/update', 'update')->name('actualizar-receta');
    Route::delete('/receta/{id}/delete', 'delete')->name('borrar-receta');
    Route::get('/planes-nutricionales', 'planes_nutricionales')->name('listado-planes');
    Route::get('/planes-nutricionales/publico/{tipo}', 'ver_plan')->name('ver-planes');
});


Route::get('/logros', function () {
    return view('estadisticas.logros_metas');
})->name('logros');


Route::controller(ReferenciaController::class)->group(function () {
    Route::get('/tabla', 'index')->name('valor_nutricional');
});

Route::get('/consultas', function () {
    return view('consulta.consultas');
})->name('consultas');

Route::get('/entrenamiento', function () {
    return view('estadisticas.entrenamiento');
})->name('entrenamiento');

Route::get('/peso', function () {
    return view('estadisticas.peso');
})->name('peso');


Route::get('/alarma', function () {
    return view('configuracion.alarma');
})->name('alarma');


Route::get('/cuenta', function () {
    return view('configuracion.cuenta');
})->name('cuenta');

Route::controller(datosController::class)->group(function () {

    Route::get('/datos', 'new')->name('datos');
    Route::get('/crear-datos', 'create')->name('crear-datos');
    Route::post('/datos/store', 'store')->name('guardar-datos');
    Route::get('/edit', 'index')->name('edit');
    Route::get('/profile/show', 'newt')->name('datost');
    Route::get('/peso', 'show')->name('peso');
});

// Si hay varias rutas que usan el mismo controlador es mejor agruparlas con el metodo Route::controller
// Las rutas deben llevar / al inicio
Route::get('editar/{datos}/editar', [datosController::class, 'editar'])->name('editar.d');
Route::put('editar/{datos}', [datosController::class, 'update'])->name('actualizar.d');



// Especialistas
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

Route::controller(nacionalidadController::class)->group(function () {

    Route::get('/pais', 'index')->name('pais');
    Route::get('/datos', 'seleccion')->name('datos');
});
