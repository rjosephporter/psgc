<?php

namespace App;

class Municipality extends BaseModel
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
