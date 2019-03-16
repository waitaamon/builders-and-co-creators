<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'short_code' => $this->short_code,
            'name' => $this->name,
            'code' => $this->code,
            'counties' => CountyResource::collection($this->counties),
        ];
    }
}
