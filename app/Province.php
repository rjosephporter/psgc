<?php

namespace App;

class Province extends BaseModel
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function cities()
    {
        return $this->morphMany(City::class, 'parent');
    }

    public function municipalities()
    {
        return $this->morphMany(Municipality::class, 'parent');
    }
}
