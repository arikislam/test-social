<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,id',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}