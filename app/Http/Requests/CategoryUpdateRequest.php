<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category.name' => [
                'unique:categories,' . $this->category['name'],
                'min:5', 
                'max:50'
            ],
            'category.slug' => ['unique:categories,' . $this->category['slug'], ],
            'description'   => ['min:5', 'max:200'],
        ];
    }
}
