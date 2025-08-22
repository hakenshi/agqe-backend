<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'cover_image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'project_type' => 'sometimes|in:social,educational,environmental,cultural,health',
            'status' => 'sometimes|in:planning,active,completed,archived',
            'responsibles' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'starting_time' => 'nullable|date_format:H:i',
            'ending_time' => 'nullable|date_format:H:i',
            'markdown' => 'nullable|string',
        ];
    }
}