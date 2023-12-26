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
            'email' => 'required|max:5|email:filter',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Sai roi:attribute',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'username',
        ];
    }

    // public function after(): array
    // {
    //     return [
    //         function (Validator $validator) {
    //             if ($this->somethingElseIsInvalid()) {
    //                 $validator->errors()->add(
    //                     'field',
    //                     'Something is wrong with this field!'
    //                 );
    //             }
    //         }
    //     ];
    // }
}
