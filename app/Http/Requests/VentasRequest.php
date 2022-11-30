<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentasRequest extends FormRequest
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
            'cantidad'=>'required|gte:1',
            'fechaVenta'=>'required|date_equals:today',
        ];
    }
    public function messages()
    {
        return [
            'cantidad.required'=>'Se necesita cantidad del producto vendido',
            'cantidad.gte'=>'Debe ser mayor que 0',
            'fechaVenta.required'=>'Se requiere fecha',
            'fechaVenta.date_equals'=>'Fecha debe ser igual a la fecha actual',
        ];
    }
}
