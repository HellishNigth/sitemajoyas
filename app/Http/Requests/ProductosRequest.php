<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
            'nombreProd' => 'required|min:3|max:30',
            'cantidadProd' => 'required',
            'precioProd' => 'required',
            'fechaIngreso' => 'required',
            'imagenProd' => 'required',
            'categoria' => 'required'

            
        ];
    }

    public function messages(){
        return [
            'nombreProd.required' => 'Indique el nombre del producto',
            'nombreProd.min' => 'Nombre de producto debe tener como mínimo 3 letras',
            'nombreProd.max' => 'Nombre de producto debe tener como máximo 30 letras',
            'nombreProd.unique' => 'Ya existe un producto llamado :input',
            'cantidadProd.required' => 'Indique la cantidad',
            'precioProd.required' => 'Indique el precio',
            'fechaIngreso.required' => 'Indique la fecha de ingreso',
            'imagenProd.required' => 'Adjunte Imagen',            
            'categoria.required' => 'Indique la categoría',            
        ];
    }
}
