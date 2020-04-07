<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeHoraExtraRequest extends FormRequest
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
            'fkidTipoHora' => 'required|max:20',
            'fkcedulaEmpleado' => 'required|max:300',
            'horasExtra' => 'integer|max:300',
            'fechaHorasExtra' => 'required|max:300',
            'observacionHoraExtra' => 'max:300',

        ];
    }
}
