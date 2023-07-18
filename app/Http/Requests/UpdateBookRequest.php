<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => ['required','string',Rule::unique('books')->ignore($this->book)],
            'author' => 'required|string',
            'description' => 'required|max:3000',
            'cover' => 'max:8192',
            'cover.*' => 'mimes:jpg,jpeg,png,webp|max:8192',
        ];
    }
}
