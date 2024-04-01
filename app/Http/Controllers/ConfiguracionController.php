<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;


class ConfiguracionController extends Controller
{
    public function __construct()
    {
        // Valida la autenticación
        $this->middleware('auth');
        $this->middleware('prevent-back-history');
        $this->middleware('check_user_answer_data_form');
    }

    static function conversor($tamano)
    {
        if ($tamano >= 1 << 30) return number_format($tamano / (1 << 30), 2) . "GB";
        if ($tamano >= 1 << 20) return number_format($tamano / (1 << 20), 2) . "MB";
        if ($tamano >= 1 << 10) return number_format($tamano / (1 << 10), 2) . "KB";
    }

    public function index()
    {
        $respaldos = [];
        $disco = Storage::disk('local');
        $archivos = $disco->files('laravel-backup');

        foreach ($archivos as $i => $archivo) {
            $fecha = Str::substr($archivo, 15, 19);

            $respaldos[$i] = [
                'indice' => ++$i,
                'nombre' => Str::substr($archivo, 15),
                'fecha' => Carbon::createFromFormat('Y-m-d-H-i-s', $fecha)->format('d/m/Y - h:i a'),
                'peso' => $this->conversor($disco->size($archivo))
            ];
        }

        return view('configuracion.respaldo_index', compact('respaldos'));
    }

    public function guardar()
    {
        try {
            Artisan::call('backup:run --only-db');

            return redirect()->back()->with('success', 'La base de datos ha sido exportada satisfactoriamente.');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Hubo un error, por favor intente de nuevo.');
        }
    }

    public function descargar($nombre_archivo)
    {
        $archivo = "laravel-backup/" . config('local/laravel-backup') . $nombre_archivo;
        $disco = Storage::disk('local');

        if ($disco->exists($archivo)) {
            $archivo_sistema = Storage::disk('local');

            $stream = $archivo_sistema->readStream($archivo);
            $archivo_descargar = sprintf('Respaldo base de datos %s', basename($archivo));

            return Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                'Content-Type' => $archivo_sistema->getMimetype($archivo),
                'Content-Length' => $archivo_sistema->getSize($archivo),
                'Content-disposition' => "attachment; filename={$archivo_descargar}",
            ]);
        } else {
            return redirect()->back()->with('noExiste', 'El respaldo que intenta descargar no existe, pruebe creando una copia de seguridad u otro respaldo.');
        }
    }
}
