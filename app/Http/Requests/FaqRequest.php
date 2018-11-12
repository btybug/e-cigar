<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            "translatable"    => "required|array|min:1",
            "translatable.*.question"  => "required|string|min:3",
            "translatable.*.answer"  => "required|string|min:3"
        ];
    }



    public function messages()
    {
        return [
            'translatable.*.title.required'  => 'Question is required',
            'translatable.*.short_description.required'  => 'Answer is required'
        ];
    }
}
