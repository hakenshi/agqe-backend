<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'donorName' => $this->donor_name,
            'donorEmail' => $this->donor_email,
            'message' => $this->message,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}