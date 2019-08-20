<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CoordCollection extends ResourceCollection
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
        return parent::toArray($request);
    }
}
