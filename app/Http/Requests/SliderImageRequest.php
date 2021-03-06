<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderImageRequest extends FormRequest
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
            'action' => 'required|string',
            'slider_image' => 'required_if:action,new|mimes:jpeg,jpg,png',
            'order' => 'required|integer',
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'url' => 'nullable|url',
        ];
    }
}
