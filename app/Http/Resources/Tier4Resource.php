<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class Tier4Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $parentType = $this->whenLoaded('parent') ? 
            strtolower(Str::afterLast($this->parent_type, '\\')) : null;

        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'urban_rural' => $this->urban_rural,
            'population' => $this->population,
            $parentType => new Tier3Resource($this->whenLoaded('parent'))
        ];
    }
}
