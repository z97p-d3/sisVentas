<?php

namespace sisGoTrade\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
           'nombre'=> 'required|max:100',
			'tipo_documento'=>'required|max:100',
			'num_documento'=>'required|max:15',
			'direccion'=>'required|max:70',
			'telefono'=>'required|max:15',
			'email'=>'required|max:50'
			
        ];
    }
}
