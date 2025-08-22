<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cpf' => 'sometimes|string|size:14|unique:users,cpf,' . $this->user->id,
            'first_name' => 'sometimes|string|max:255',
            'second_name' => 'sometimes|string|max:255',
            'photo' => 'nullable|string|url',
            'occupation' => 'sometimes|string|max:255',
            'password' => 'sometimes|string|min:6',
            'birth_date' => 'sometimes|date',
            'joined_at' => 'sometimes|date',
            'color' => 'sometimes|in:black,pink,purple,blue,teal,red,indigo,yellow,green,gray,orange,cyan,lime',
        ];
    }
}