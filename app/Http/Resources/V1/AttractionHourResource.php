<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttractionHourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'day1'=>$this->day1,
            'day2'=>$this->day2,
            'day3'=>$this->day3,
            'day4'=>$this->day4,
            'day5'=>$this->day5,
            'day6'=>$this->day6,
            'day7'=>$this->day7,
            'attraction_id' => $this->attraction_id,

        ];
    }
}
