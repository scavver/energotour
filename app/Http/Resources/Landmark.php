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
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
            ],
        ];
    }
}
