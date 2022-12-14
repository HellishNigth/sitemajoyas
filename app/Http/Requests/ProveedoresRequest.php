<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DigitoVerificadorRut;

class ProveedoresRequest extends FormRequest
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
            'rut_proveedor' => ['bail','required','unique:proveedores,rut_proveedor,NULL,id,deleted_at,NULL','regex:/^(\d{7,8}-[\dkK])$/',new DigitoVerificadorRut],
            'nombreProv' => 'required|min:3|max:20',
            'apellidoProv' => 'required|min:3|max:20',
            'direccionProv' => 'required|min:8|max:50',
            'emailProv' => 'required|min:15|max:40',
            'telefonoProv' => 'required|min:12|max:12',
        ];
    }

    public function messages(){
        return[
            'rut_proveedor.required' => 'Indique RUT del proveedor',
            'rut_proveedor.unique' => 'Proveedor ya existe',
            'rut_proveedor.regex'=>'Indique RUT sin puntos, con guión y con digito verificador',
            'nombreProv.required' => 'Indique el nombre del proveedor',
            'nombreProv.min' => 'Nombre del proveedor debe tener como mínimo 3 letras',
            'nombreProv.max' => 'Nombre del proveedor debe tener como máximo 20 letras',
            'apellidoProv.required' => 'Indique el apellido del proveedor',
            'apellidoProv.min' => 'Apellido del proveedor debe tener como mínimo 3 letras',
            'apellidoProv.max' => 'Apellido del proveedor debe tener como máximo 20 letras',
            'direccionProv.required' => 'Indique la dirección del proveedor',
            'direccionProv.min' => 'Dirección del proveedor debe tener como mínimo 8 caracteres',
            'direccionProv.max' => 'Dirección del proveedor debe tener como máximo 50 caracteres',
            'emailProv.required' => 'Indique el correo del proveedor',
            'emailProv.min' => 'Correo del proveedor debe tener como mínimo 15 caracteres',
            'emailProv.max' => 'Correo del proveedor debe tener como máximo 40 caracteres',
            'telefonoProv.required' => 'Indique el teléfono del proveedor',
            'telefonoProv.min' => 'Teléfono del proveedor debe tener como mínimo 12 digitos',
            'telefonoProv.max' => 'Teléfono del proveedor debe tener como máximo 12 digitos',
        ];
    }
}
