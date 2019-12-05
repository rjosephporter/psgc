<?php

namespace App;

class Region extends BaseModel
{
    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
