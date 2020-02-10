<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PokemonRequest extends FormRequest
{
    public function attributes() {
        return [
            'name'      =>      'Nombre pokemon',
            'weight'    =>      'Peso pokemon',
            'height'    =>      'Altura de pokemon',
            'type'      =>      'Tipo de pokemon',
            'file'      =>      'Imagen de pokemon',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();  // esta autorizacion te devuelve true si estas autentificado   ¿  algo se me escapa ?
    }

    public function messages() {
//        $alpha      = 'El campo :attribute es alfanumérico';
        $required   = 'El campo :attribute es obligatorio';
        $min        = 'La longitud mínima del campo :attribute es :min';
        $max        = 'La longitud máxima del campo :attribute es :max';
        $numeric    = 'El valor campo :attribute debe de ser numérico.';
        $gte        = 'El valor campo :attribute debe de ser mayor o igual que cero.';
        $lte        = 'El valor campo :attribute debe de ser mayor que uno.';
        $mimes      = 'El tipo de archivo :attribute debe de ser una imagen.';
        $unique     = 'Ya exite un Pokemon con el nombre :value.';
        return [
            'name.required'      => $required,
            'name.min'           => $min,
            'name.max'           => $max,
            'name.unique'        => $unique,
            'type.required'      => $required,
            'type.min'           => $min,
            'type.max'           => $max,
            'height.numeric'     => $gte,
            'height.gte'         => $gte,
            'altura.lte'         => $lte,
            'weight.numeric'     => $numeric,
            'weight.gte'         => $gte,
            'weight.lte'         => $lte,
            'file.mimes'         => $mimes,
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      =>      'required|min:2|max:40|unique:pokemon,name',  // asi antes de intentar insentar un pokemon comprueba que es nombre no este ya
            'weight'    =>      'nullable|numeric|gte:0|lte:9999.99',
            'height'    =>      'nullable|numeric|gte:0|lte:9999.99',
            'type'      =>      'required|min:2|max:40',
            'file'      =>      'nullable|mimes:jpeg,gif,png,jpg',
        ];
    }
}
