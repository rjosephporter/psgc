<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tier2Resource extends JsonResource
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
            'code' => $this->code,
            'name' => $this->name,
            'population' => $this->population,
            'region' => new Tier1Resource($this->whenLoaded('region')),
            'cities' => Tier3Resource::collection($this->whenLoaded('cities')),
            'municipalities' => Tier3Resource::collection($this->whenLoaded('municipalities')),
        ];
    }
}
