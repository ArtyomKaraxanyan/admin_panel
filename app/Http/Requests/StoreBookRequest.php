<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string|unique:books,title',
            'cover' => 'required',
            'cover.*' => 'mimes:jpg,jpeg,png,webp',
            'author' => 'required|string',
            'description' => 'required|max:3000',
        ];
    }
}
