<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SponsorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo' => $this->logo,
            'website' => $this->website,
            'sponsoringSince' => $this->sponsoring_since,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}