<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cpf' => 'required|string|size:14|unique:users',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'occupation' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'birth_date' => 'required|date',
            'joined_at' => 'required|date',
            'color' => 'required|in:black,pink,purple,blue,teal,red,indigo,yellow,green,gray,orange,cyan,lime',
        ];
    }
}