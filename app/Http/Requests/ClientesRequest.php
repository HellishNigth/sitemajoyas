<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'rut_cliente'=>'required|min:10|max:10',
            'nombreClie'=>'required|min:3|max:50',
            'apellidoClie'=>'required|min:3|max:50',
            'direccionClie'=>'required|min:50|max:100',
            'emailClie'=>'required|min:10|max:50',
            'telefonoClie'=>'required|min:12|max:12'
        ];
    }

    public function messages(){
        return[
            'rut_cliente.required'=>'Se necesita rut del cliente',
            'rut_cliente.min'=>'El rut del cliente debe tener 10 caracteres',
            'rut_cliente.max'=>'El rut del cliente debe tener 10 caracteres',
            'nombreClie.required'=>'Se necesita nombre del cliente',
            'nombreClie.min'=>'El nombre del cliente debe tener mas de 3 caracteres',
            'nombreClie.max'=>'El nombre del cliente debe tener menos de 50 caracteres',
            'apellidoClie.required'=>'Se necesita apellido del cliente',
            'apellidoClie.min'=>'El apellido del cliente debe tener mas de 3 caracteres',
            'direccionClie.required'=>'Se necesita direccion del cliente',
            'direccionClie.min'=>'La direccion del cliente debe tener mas de 50 caracteres',
            'direccionClie.max'=>'La direccion del cliente debe tener menos de 100 caracteres',
            'emailClie.required'=>'Se necesita email del cliente',
            'emailClie.min'=>'El email del cliente debe tener mas de 10 caracteres',
            'emailClie.max'=>'El email del cliente debe tener menos de 50 caracteres',
            'telefonoClie.required'=>'Se necesita telefono del cliente',
            'telefonoClie.min'=>'El telefono del cliente debe tener  12 caracteres',
            'telefonoClie.max'=>'El telefono del cliente debe tener 12 caracteres',
        ];
    }
}
