<?php

namespace App\Http\Requests\Api\Property;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'building_name' => 'nullable|string|max:60',
            'address_1' => 'required|string|max:60',
            'address_2' => 'nullable|string|max:60',
            'city' => 'required|string|max:40',
            'post_code' => 'required|string|max:8',
            'county' => 'nullable|string|max:60',
            'country_code' => 'required|string|size:2'
        ];
    }
}
