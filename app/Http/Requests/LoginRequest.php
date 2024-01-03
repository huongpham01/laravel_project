<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|max:7'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => ':attribute is empty',
            'password.required' => ':attribute is empty',
            'password.max' => ':attribute is longer than 7 characters'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
}
