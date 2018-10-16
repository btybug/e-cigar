<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributesPost extends FormRequest
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
            'icon' => 'required|string|min:3',
            'name' => 'required|string|min:3',
            "translatable.*.name"  => "required|string|min:3",
        ];
    }

    public function messages()
    {
        return [
            'icon.required' => 'A icon is required',
            'name.required'  => 'A name is required',
            "translatable.*.name"  => "A name is required",
        ];
    }
}
