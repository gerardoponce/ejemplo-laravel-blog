<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

// Acomoda y verifica el array entrante antes de la creacion de la Categoria
class CategoryStoreRequest extends FormRequest
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
        // consultar sobre el minimo y maximo de caracteres
        $rules = [
            'name'          => 'required|unique:categories|min:5|max:50',
            'slug'          => 'required|unique:categories',
            'description'   => 'required|min:5|max:200',
        ];

        if ($this->get('image_path')) {
            $rules = array_merge($rules, ['image_path' => 'mimes:jpg,jpeg,png']);
        }
        
        return $rules;
    }
}
