<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'is_published' => $this->is_published,
            'publish_date' => $this->publish_date,
            'featured' => $this->featured,
            'topics' => TopicResource::collection($this->topics),
            'featured_image_url' => $this->when($this !== null, function () {
                $items = $this->media;
                return $items[0]->getFullUrl();
            }),
        ];
    }
}
