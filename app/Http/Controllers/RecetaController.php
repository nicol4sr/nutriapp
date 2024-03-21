<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecetaRequest;
use App\Models\Comida;
use App\Models\Nutricional;
use App\Models\Receta;
use App\Models\Tipo;
use Illuminate\Support\Facades\Auth;

class RecetaController extends Controller
{
    public function __construct()
    {
        // Valida la autenticación
        $this->middleware('auth');
        $this->middleware('prevent-back-history');
    }

    public function index()
    {
        $usuario = auth()->user()->id;
        $recetas = Receta::where('usuario_id', '=', $usuario)->paginate(15);

        return view('receta.index', compact('recetas'));
    }

    public function create()
    {
        $tipos = Tipo::all();
        $comidas = Comida::all();
        $alimentos = Nutricional::all();

        return view('receta.create', compact('tipos', 'comidas', 'alimentos'));
    }

    public function store(StoreRecetaRequest $request)
    {
        $validado = $request->validated();
        $receta = Receta::create($validado + ['usuario_id' => Auth::user()->id]);
        $receta->alimentos()->sync($request['alimento']);

        return redirect('/receta');
    }

    public function show($id)
    {
        $receta = Receta::find($id);

        return view('receta.show', compact('receta'));
    }

    public function edit($id)
    {
        $tipos = Tipo::all();
        $comidas = Comida::all();
        $alimentos = Nutricional::all();
        $receta = Receta::find($id);
        return view('receta.edit', compact('receta', 'tipos', 'comidas', 'alimentos'));
    }

    public function update(StoreRecetaRequest $request, $id)
    {
        $validado = $request->validated();

        $receta = Receta::find($id);
        $receta->update($validado);
        $receta->alimentos()->sync($request['alimento']);

        return redirect('/receta');
    }

    public function delete($id)
    {
        if (isset($id)) {
            $receta = Receta::find($id);
            $receta->destroy($receta->id);
            return redirect('/receta');
        }

        return redirect()->back();
    }

    public function planes_nutricionales()
    {
        $tipos = Tipo::all();
        return view('planes.nutricional.index', compact('tipos'));
    }

    public function ver_plan(Tipo $tipo)
    {
        if ($tipo == null) {
            return redirect('/planes-nutricionales');
        }

        $usuario = auth()->user()->id;
        $planes = Receta::where('tipo_id', '=', $tipo->id)->where('usuario_id', '!=', $usuario)->paginate(15);
        return view('planes.nutricional.list', compact('planes', 'tipo'));
    }
}
