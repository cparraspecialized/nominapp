<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEmpleadoRequest extends FormRequest
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

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'sueldoEmpleado'  => 'Solo se aceptan números',
        ];
    }
    public function rules()
    {
        return [
            'cedula' => 'required|max:20',
            'nombreEmpleado' => 'required|max:300',
            'apellidoEmpleado' => 'required|max:300',
            'fkidTienda' => 'required|max:300',
            'fechaIngresoEmpleado' => 'required|max:300',
            'fkidTipoContrato' => 'required|max:300',
            'fkidTipoCargo' => 'required|max:300',
            'fkcentroCostos' => 'required|max:300',
            'fkdivision' => 'required|max:300',
            'sueldoEmpleado' => 'integer|required',

        ];
    }


}
