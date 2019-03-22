<?php

namespace App\Http\Requests\Directory;

use Illuminate\Foundation\Http\FormRequest;

class MembershipTypeRequest extends FormRequest
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
            'membership' => 'required|integer|exists:memberships,id',
            'is_engineer' => 'required|boolean',
            'is_specialized' => 'required|boolean',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:300',
            'bodies' => 'nullable|array'
        ];
    }
}
