<?php

namespace App\Http\Requests\Directory;

use Illuminate\Foundation\Http\FormRequest;

class PersonalDetailsRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|unique:users,email',
            'id_number' => 'required|string|max:8|min:7',
            'fb_name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone'
        ];
    }
}
