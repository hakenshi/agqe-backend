<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cpf' => $this->cpf,
            'firstName' => $this->first_name,
            'secondName' => $this->second_name,
            'photo' => $this->photo,
            'occupation' => $this->occupation,
            'color' => $this->color,
            'birthDate' => $this->birth_date,
            'joinedAt' => $this->joined_at,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}