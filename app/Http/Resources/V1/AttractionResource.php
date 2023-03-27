<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttractionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'   => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'num_reviews' => $this->num_reviews,
            'location_string' => $this->location_string,
            'ranking' => $this->ranking,
            'ranking_in_city' => $this->ranking_in_city,
            'rating' => $this->rating,
            'description' => $this->description,
            'subcategory' => $this->subcategory,
            'subtype' => $this->subtype,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'attractionHours' => AttractionHourResource::collection($this->attractionHours),

        ];
    }
}
