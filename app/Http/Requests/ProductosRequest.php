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
            'nombreProd' => 'required|min:3|max:30|unique:productos,nombreProd,NULL,id,deleted_at,NULL',
            'cantidadProd' => 'required',
            'precioProd' => 'required',
            'fechaIngreso' => 'required|before_or_equal:today',
            'imagenProd' => 'required',
            'categoria' => 'required'

            
        ];
    }

    public function messages(){
        return [
            'nombreProd.unique' => 'Ya existe este producto',
            'nombreProd.required' => 'Indique el nombre del producto',
            'nombreProd.min' => 'Nombre de producto debe tener como mínimo 3 letras',
            'nombreProd.max' => 'Nombre de producto debe tener como máximo 30 letras',
            'cantidadProd.required' => 'Indique la cantidad',
            'precioProd.required' => 'Indique el precio',
            'fechaIngreso.before_or_equal' => 'Fecha debe ser igual o menor que la fecha actual',
            'fechaIngreso.required' => 'Indique la fecha de ingreso',
            'imagenProd.required' => 'Adjunte Imagen',            
            'categoria.required' => 'Indique la categoría',            
        ];
    }
}
