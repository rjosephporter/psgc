<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tier4Resource;
use App\Http\Resources\Tier2Resource;
use App\Http\Resources\SubMunicipalityResource;

class Tier3Resource extends JsonResource
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
            'city_class' => $this->city_class,
            'income_classification' => $this->income_classification,
            'population' => $this->population,
            'parent' => new Tier2Resource($this->whenLoaded('parent')),
            'submunicipalities' => SubMunicipalityResource::collection($this->whenLoaded('submunicipalities')),
            'barangays' => Tier4Resource::collection($this->whenLoaded('barangays'))
        ];
    }
}
