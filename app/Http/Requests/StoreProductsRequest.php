<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
                 'name' => 'required|unique:products,name->ar,'.$this->id,
                 'name_en' => 'required|unique:products,name->en,'.$this->id,
                 'category_id' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('Backend/products.This field is required'),
            'name_en.required' => trans('Backend/products.This field is required'),
            'name.unique' => trans('Backend/products.The product field in Arabic already exists'),
            'name_en.unique' => trans('Backend/products.The product field in English already exists'),
            'category_id.required' => trans('Backend/products.This field is required'),
        ];
    }
}
