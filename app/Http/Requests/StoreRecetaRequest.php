<?php

namespace App\Http\Requests;

use App\Models\Comida;
use App\Models\Nutricional;
use App\Models\Tipo;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecetaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tipos = Tipo::all()->count();
        $comidas = Comida::all()->count();
        $alimentos = Nutricional::all()->count();

        return [
            'nombre' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'edad' => ['required', 'numeric'],
            'genero' => ['required', 'numeric', 'between:0,1'],
            'tipo_id' => ['required', 'numeric', 'not_in:0', 'max:' . $tipos],
            'comida_id' => ['required', 'numeric', 'not_in:0', 'max:' . $comidas],
            'alimento' => ['required', 'array', 'not_in:0', 'max:' . $alimentos],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es necesario',
            'nombre.string' => 'El nombre debe ser una oración',
            'tipos.required' => 'El tipo es necesario',
            'tipos.not_in' => 'La opción seleccionada es inválido',
            'tipos.max' => 'La opción seleccionada no se encuentra disponible',
            'tipos.numeric' => 'La opción seleccionada debe ser válida',
            'comidas.required' => 'El tipo es necesario',
            'comidas.not_in' => 'La opción seleccionada es inválido',
            'comidas.max' => 'La opción seleccionada no se encuentra disponible',
            'comidas.numeric' => 'La opción seleccionada debe ser válida',
            'recetas.required' => 'El tipo es necesario',
            'recetas.not_in' => 'La opción seleccionada es inválido',
            'recetas.max' => 'La opción seleccionada no se encuentra disponible',
            'recetas.numeric' => 'La opción seleccionada debe ser válida',
        ];
    }
}
