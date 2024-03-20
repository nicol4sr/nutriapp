<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecialistaRequest extends FormRequest
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
        return [
            'especialidad' => ['required', 'numeric', 'between:0,2'],
            'nro_permiso' => ['required', 'string', 'max:20'],
            'cedula' => ['required', 'string', 'max:8'],
            'comprobante' => ['required', 'file', 'mimes:jpeg,png,jpg']
        ];
    }
}
