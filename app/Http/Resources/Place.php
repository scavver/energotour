<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Place extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    // Laravel Documentation Eloquent: API Resources
    public function toArray($request)
    {
        /**
         * 'properties' => $this->properties->map(function($row){ return $row->only(['id','class','title']); });
         *
         * Не лучшая практика использовать функцию map - лучше создать отдельный ресурс.
         */
        return [
            'enabled' => $this->enabled,
            'name' => $this->name,
            'slug' => $this->slug,
            'type' => $this->type,
            'image' => $this->image['path'],
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
