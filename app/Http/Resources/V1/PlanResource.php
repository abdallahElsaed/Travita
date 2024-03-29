<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'city' => $this->city,
            'days' => $this->days,
            'price' => $this->price,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
