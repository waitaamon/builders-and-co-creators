<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderImageResource extends JsonResource
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
            'user_id' => $this->user_id,
            'identifier' => $this->identifier,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'url' => $this->url,
            'order' => $this->order,
            'image_url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getFullUrl();
            }),
        ];
    }
}
