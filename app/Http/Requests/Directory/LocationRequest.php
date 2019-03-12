<?php

namespace App\Http\Requests\Directory;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'country' => 'required|integer|exists:countries,id',
            'county' => 'required|integer|exists:counties,id',
            'sub_county' => 'required|integer|exists:sub_counties,id',
            'state' => 'required_unless:country,254|string|max:100'
        ];
    }
}
