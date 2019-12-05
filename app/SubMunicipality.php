<?php

namespace App;

class SubMunicipality extends BaseModel
{
    public function parent()
    {
        return $this->morphTo();
    }

    public function barangays()
    {
        return $this->morphMany(Barangay::class, 'parent');
    }
}
