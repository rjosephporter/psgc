<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Tier1Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'population' => $this->population,
            'provinces' => Tier2Resource::collection($this->whenLoaded('provinces')),
            'districts' => Tier2Resource::collection($this->whenLoaded('districts'))
        ];

        return $data;
    }
}
