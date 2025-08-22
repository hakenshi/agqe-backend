<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'cover_image' => 'required|string|url',
            'project_type' => 'required|in:social,educational,environmental,cultural,health',
            'status' => 'required|in:planning,active,completed,archived',
            'responsibles' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'starting_time' => 'nullable|date_format:H:i',
            'ending_time' => 'nullable|date_format:H:i',
            'markdown' => 'nullable|string',
        ];
    }
}