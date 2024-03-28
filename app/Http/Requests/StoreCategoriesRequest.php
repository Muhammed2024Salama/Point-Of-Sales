<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories,name->ar,'.$this->id,
            'name_en' => 'required|unique:categories,name->en,'.$this->id,
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' =>   trans('Backend/categories.Please enter the section name in Arabic') ,
            'name_en.required' =>  trans('Backend/categories.Please enter the section name in English'),
        ];
    }
}
