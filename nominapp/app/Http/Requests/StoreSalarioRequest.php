<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalarioRequest extends FormRequest
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
            'salarioBase' => 'Solo se aceptan números',
            'bonificacion' => 'Solo se aceptan números',
            'auxilioTransporte' => 'Solo se aceptan números',
            'auxilioCapacitacion' => 'Solo se aceptan números',
            'auxilioComunicacion' => 'Solo se aceptan números',
            'gastoRepresentacion' => 'Solo se aceptan números',
            'auxilioMedicinaPrepagada' => 'Solo se aceptan números',
        ];
    }

    public function rules()
    {
        return [
            'salarioBase' => 'integer|required',
            'bonificacion' => 'integer',
            'auxilioTransporte' => 'integer',
            'auxilioCapacitacion' => 'integer',
            'auxilioComunicacion' => 'integer',
            'gastoRepresentacion' => 'integer',
            'auxilioMedicinaPrepagada' => 'integer',
        ];
    }
}
