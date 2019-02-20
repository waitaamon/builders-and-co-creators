<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'username' => $this->user->name,
            'title' => $this->title,
            'url' => $this->url,
            'slug' => $this->slug,
            'topics' => TopicResource::collection($this->topics),
        ];
    }
}
