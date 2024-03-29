<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReviewRequest extends FormRequest
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
            'title' => 'required|string|max:225',
            'content' => 'required|string',
            'category' => 'required|array',
            'category.*' => [
                Rule::in(config('const.tables.reviews.category'))
            ],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
