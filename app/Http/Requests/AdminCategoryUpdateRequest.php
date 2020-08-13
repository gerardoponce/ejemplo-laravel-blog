<?php

namespace App\Http\Requests;

// no se puede cambiar el slug una vez creado el articulo
use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryUpdateRequest extends FormRequest
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
