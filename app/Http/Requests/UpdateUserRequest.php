<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateUserRequest extends FormRequest
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
            'name' => 'sometimes|string',
            'type_of_user' => 'required',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg,webp',
            // 'jmbg' => 'unique:users,jmbg,'.$user->id,
            'email' => 'sometimes|email|unique:users,email,'.$this->user,

        ];
    }
}
