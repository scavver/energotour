<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Landmark extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'slug' => $this->slug,
            'region' => [
                'id' => $this->region->id,
                'name' => $this->region->name,
            ],
            'image' => $this->image['path'],
            'gallery' => [
                'images' => empty($this->gallery->images) ? null : $this->gallery->images->pluck('path')->all(),
            ],
        ];
    }
}
