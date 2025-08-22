<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'event_type' => 'sometimes|in:gallery,event,event_gallery',
            'date' => 'sometimes|date',
            'starting_time' => 'sometimes|date_format:H:i',
            'ending_time' => 'sometimes|date_format:H:i',
            'location' => 'sometimes|string|max:255',
            'markdown' => 'nullable|string',
        ];
    }
}