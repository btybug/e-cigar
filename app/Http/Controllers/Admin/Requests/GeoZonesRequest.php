<?php

namespace App\Http\Controllers\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegionsRequest
 * @package App\Http\Controllers\Admin\Requests
 */
class GeoZonesRequest extends FormRequest
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

        return ['name' => 'required|max:190',
            'tax_rate_id' => 'nullable|exists:tax_rates,id',
            'description' => 'required',
            'payment_options' => 'required',
            'delivery_cost' => 'required|array',
            'country' => 'required',
            'regions' => 'required',
            'delivery_cost.*.delivery_cost_types_id' => 'required|exists:delivery_cost_types,id',
            'delivery_cost.*.min' => 'required|integer|min:0',
            'delivery_cost.*.max' => 'required|integer',
            'delivery_cost.*.options' => 'required|array',
            'delivery_cost.*.options.*.courier_id' => 'required|exists:couriers,id',
            'delivery_cost.*.options.*.cost' => 'required|between:0,99.999999',
            'delivery_cost.*.options.*.time' => 'required',

            'delivery_cost.*.options.new' => 'required|array',
            'delivery_cost.*.options.new.*.courier_id' => 'required|exists:couriers,id',
            'delivery_cost.*.options.new.*.cost' => 'required|between:0,99.999999',
            'delivery_cost.*.options.new.*.time' => 'required',

            'delivery_cost_new.*.delivery_cost_types_id' => 'required|exists:delivery_cost_types,id',
            'delivery_cost_new.*.min' => 'required|integer|min:0',
            'delivery_cost_new.*.max' => 'required|integer',
            'delivery_cost_new.*.options.new' => 'required|array',
            'delivery_cost_new.*.options.new.*.courier_id' => 'required|exists:couriers,id',
            'delivery_cost_new.*.options.new.*.cost' => 'required|between:0,99.999999',
            'delivery_cost_new.*.options.new.*.time' => 'required',
            ];
    }
}