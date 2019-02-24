<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\This;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:posts,title,' . $this->id,
            'featured_image' => 'required_if:action,new|mimes:jpeg,jpg,png',
            'featured' => 'required|boolean',
            'publish' => 'required|boolean',
            'topics' => 'required',
            'body' => 'required|string',
        ];
    }
}
