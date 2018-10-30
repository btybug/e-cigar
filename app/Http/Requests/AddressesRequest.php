<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressesRequest extends FormRequest
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
            "first_line_address"  => "required",
            "second_line_address"  => "required",
            "city"  => "required",
            "country"  => "required",
            "region"  => "required",
            "post_code"  => "required",
        ];
    }

}
