<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeNovedadRequest extends FormRequest
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
            'fkcedulaEmpleado' => 'required|max:20',
            'fechaNovedad' => 'required|max:300',
            'fktipoNovedad' => 'required|max:300',
            'fechaFinNovedad' => 'required|max:300',

        ];
    }
}
