<?php

namespace App;

class City extends BaseModel
{
    public function parent()
    {
        return $this->morphTo();
    }

    public function submunicipalities()
    {
        return $this->morphMany(SubMunicipality::class, 'parent');
    }

    public function barangays()
    {
        return $this->morphMany(Barangay::class, 'parent');
    }
}
