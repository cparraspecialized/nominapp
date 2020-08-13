<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParametroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    public function messages()
    {
        return [
            'salarioMinimo' => 'Solo se aceptan números',
            'auxilioTransportes' => 'Solo se aceptan números',
        ];
    } 
    

    public function rules()
    {
        return [
            'salarioMinimo' => 'integer|required',
            'auxilioTransportes' => 'integer|required',
        ];
    }
}
