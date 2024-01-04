<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|in:Self-help,Detective,Foreign literature,Viet Nam literature',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ':attribute is required',
            'title.string' => ':attribute must be a string',
            'title.max' => ':attribute cannot be longer than 255 characters',

            'content.required' => ':attribute is required',
            'content.string' => ':attribute must be a string',

            'image.image' => 'The selected file must be an image',
            'image.mimes' => 'The :attribute must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The :attribute may not be greater than 2048 kilobytes',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'content' => 'Content',
            'image' => 'Image'
        ];
    }
}
