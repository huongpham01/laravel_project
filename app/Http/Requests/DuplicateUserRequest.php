<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DuplicateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => ':attribute is existed. Please input again! ',
            'email.unique' => ':attribute is existed. Please input again!',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email'
        ];
    }
}
