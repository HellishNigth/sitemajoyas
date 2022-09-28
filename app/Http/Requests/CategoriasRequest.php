<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequest extends FormRequest
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
            'nombreCat' => 'required|min:3|max:20'
        ];
    }

    public function messages(){
        return [
            'nombreCat.required' => 'Indique el nombre de la categoría',
            'nombreCat.min' => 'Nombre de categoría debe tener como mínimo 3 letras',
            'nombreCat.max' => 'Nombre de categoría debe tener como máximo 20 letras'
        ];
    }
}
