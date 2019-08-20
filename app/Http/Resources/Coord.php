<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Coord extends Resource
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
        return [
            'name' => $this->name,
            'coords' => [$this->lat, $this->lng]
        ];
    }
}
