<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'numberOfReviews' => $this->numberOfReviews,
            'ranking' => $this->ranking,
            'ranking_in_city' => $this->ranking_in_city,
            'cuisine' => $this->cuisine,
            'dietaryRestrictions' => $this->dietaryRestrictions,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'reviewTags' => $this->reviewTags,
            'restaurantHours' => RestaurantHourResource::collection($this->restaurantHours),

        ];
    }
}
