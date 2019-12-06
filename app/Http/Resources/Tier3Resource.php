<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
        $parentType = $this->whenLoaded('parent') ? 
            strtolower(Str::afterLast($this->parent_type, '\\')) : null;

        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'city_class' => $this->city_class,
            'income_classification' => $this->income_classification,
            'population' => $this->population,
            $parentType => new Tier2Resource($this->whenLoaded('parent')),
            'submunicipalities' => SubMunicipalityResource::collection($this->whenLoaded('submunicipalities')),
            'barangays' => Tier4Resource::collection($this->whenLoaded('barangays'))
        ];
    }
}
