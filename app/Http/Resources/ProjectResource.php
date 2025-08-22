<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'coverImage' => asset('storage/' . $this->cover_image),
            'responsibles' => $this->responsibles,
            'projectType' => $this->project_type,
            'slug' => $this->slug,
            'markdown' => $this->markdown,
            'location' => $this->location,
            'date' => $this->date,
            'startingTime' => $this->starting_time,
            'endingTime' => $this->ending_time,
            'status' => $this->status,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}