<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Acomoda y verifica el array entrante antes de la actualizacion de la Categoria
// no se puede cambiar el slug una vez creado el articulo
class CategoryUpdateRequest extends FormRequest
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
            'category.name' => ['unique:categories,' . $this->category['name'], ],
            'description'   => ['required', ],
        ];
    }
}
