<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:8',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}