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
            'county' => 'required_if:country,104',
            'sub_county' => 'required_if:country,104',
            'state' => 'required_unless:country,104'
        ];
    }

    public function messages()
    {
        return [
            'state.required_unless' => 'State field is required.',
            'county.required_if' => 'Select at least one county.',
            'sub_county.required_if' => 'Select at least one sub county / constituency',
        ];
    }
}
