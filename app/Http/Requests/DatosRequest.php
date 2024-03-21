<?php

namespace App\Http\Requests;

use App\Models\nacionalidades;
use App\Models\Tipo;
use Illuminate\Foundation\Http\FormRequest;

class DatosRequest extends FormRequest
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
        $nacionalidades = nacionalidades::all()->count();
        $objetivos = Tipo::all()->count();

        return [
            'nacionalidad_id' => ['required', 'numeric', 'not_in:0', 'max:' . $nacionalidades],
            'objetivo_id' => ['required', 'numeric', 'not_in:0', 'max:' . $objetivos],
            'habitos' => ['required', 'numeric', 'between:0,3'],
            'genero' => ['required', 'numeric', 'between:0,1'],
            'peso' => ['required', 'numeric'],
            'altura' => ['required', 'numeric'],
            'discapacidad' => ['required', 'string'],
            'alergia' => ['required', 'string'],
            'nacimiento' => ['required', 'date_format:Y-m-d'],
        ];
    }
}
