<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'event_type' => 'required|in:gallery,event,event_gallery',
            'date' => 'required|date',
            'starting_time' => 'required|date_format:H:i',
            'ending_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'markdown' => 'nullable|string',
        ];
    }
}