<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'url' => 'required|unique:posts',
            "translatable"    => "required|array|min:1",
            "translatable.*.title"  => "required|string|min:3",
            "translatable.*.short_description"  => "required|string|min:3",
            "translatable.*.long_description"  => "required|string|min:3",
        ];
    }
}
