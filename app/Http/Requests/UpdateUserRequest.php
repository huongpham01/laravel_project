<?php

namespace App\Http\Requests;
// use Illuminate\Validation\Rule;


use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->id,
            // Rule::unique('users')->ignore($user->id), (cách viết dùng Rule)
        ];
    }
}
