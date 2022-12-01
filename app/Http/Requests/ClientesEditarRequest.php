<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DigitoVerificadorRut;

class ClientesEditarRequest extends FormRequest
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
            'rut_cliente'=> ['bail','required','regex:/^(\d{7,8}-[\dkK])$/',new DigitoVerificadorRut],
            'nombreClie'=>'required|min:3|max:20',
            'apellidoClie'=>'required|min:3|max:20',
            'direccionClie'=>'required|min:8|max:50',
            'emailClie'=>'required|min:15|max:40',
            'telefonoClie'=>'required|min:12|max:12'
        ];
    }

    public function messages(){
        return[
            'rut_cliente.required'=>'Se necesita rut del cliente',
            'rut_cliente.regex'=>'Indique RUT sin puntos, con guión y con digito verificador',
            'nombreClie.required'=>'Se necesita nombre del cliente',
            'nombreClie.min'=>'El nombre del cliente debe tener minimo de 3 caracteres',
            'nombreClie.max'=>'El nombre del cliente debe tener maximo de 20 caracteres',
            'apellidoClie.required'=>'Se necesita apellido del cliente',
            'apellidoClie.min'=>'El apellido del cliente debe tener minimo de 3 caracteres',
            'apellidoClie.max'=>'El apellido del cliente debe tener maximo de 20 caracteres',
            'direccionClie.required'=>'Se necesita direccion del cliente',
            'direccionClie.min'=>'La direccion del cliente debe tener minimo de 8 caracteres',
            'direccionClie.max'=>'La direccion del cliente debe tener maximo de 50 caracteres',
            'emailClie.required'=>'Se necesita email del cliente',
            'emailClie.min'=>'El email del cliente debe tener minimo de 15 caracteres',
            'emailClie.max'=>'El email del cliente debe tener maximo de 40 caracteres',
            'telefonoClie.required'=>'Se necesita telefono del cliente',
            'telefonoClie.min'=>'El telefono del cliente debe tener  12 caracteres',
            'telefonoClie.max'=>'El telefono del cliente debe tener 12 caracteres',
        ];
    }
}
