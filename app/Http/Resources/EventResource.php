<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'coverImage' => asset('storage/' . $this->cover_image),
            'eventType' => $this->event_type,
            'slug' => $this->slug,
            'markdown' => $this->markdown,
            'date' => $this->date,
            'startingTime' => $this->starting_time,
            'endingTime' => $this->ending_time,
            'location' => $this->location,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}