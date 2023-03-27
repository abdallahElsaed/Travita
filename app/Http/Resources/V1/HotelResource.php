<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'rating' => $this->rating,
            'ranking_in_city' => $this->ranking_in_city,
            'reviewTags' => $this->reviewTags,
            'hotelClass' => $this->hotelClass,
            'numberOfReviews' => $this->numberOfReviews,
            'priceRange' => $this->priceRange,
        ];
    }
}
