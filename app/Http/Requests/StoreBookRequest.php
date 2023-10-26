<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|max:500',
            'page_count' => 'required|integer|min:1',
            'script' => 'required|string|exists:scripts,id',
            'binding' => 'required|string|exists:bindings,id',
            'size' => 'required|string|exists:sizes,id',
            'isbn' => 'required|string',
            'publisher' => 'required|string|exists:publishers,id',
            'publish_date' => 'required|string',
            'total_count' => 'required|integer|min:1',
            'categories.*' => 'required|exists:categories,id',
            'genres.*' => 'required|exists:genres,id',
            'authors.*' => 'required|exists:authors,id',
            'image .*' => 'sometimes|image|mimes:jpg,png,jpeg,webp',
            'chosen_image' => 'sometimes|integer'
        ];
    }
}
