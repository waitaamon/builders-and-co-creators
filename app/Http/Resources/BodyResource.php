<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BodyResource extends JsonResource
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
            'value' => $this->id,
            'title' => $this->title,
            'text' => $this->title,
            'description' => $this->description,
            'registered_on' => $this->created_at,
            'memberships' => $this->memberships,
            'membership_types' => $this->membership_types
        ];
    }
}
