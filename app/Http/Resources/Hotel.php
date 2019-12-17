<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Hotel extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'enabled' => $this->enabled,
            'name' => $this->name,
            'slug' => $this->slug,
            'type' => $this->type,
            'image' => $this->image['path'],
            'rooms' => $this->rooms->map(function ($item) {
                return collect($item->toArray())
                    ->only(['id', 'name'])
                    ->all();
            }),
            'region' => [
                'id' => $this->region->id,
                'name' => $this->region->name,
            ],
            'discount' => $this->discount['max_discount'],
            'price' => $this->price['min_price'],
            'properties' => $this->properties,
        ];
    }
}
