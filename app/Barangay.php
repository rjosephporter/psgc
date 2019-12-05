<?php

namespace App;

class Barangay extends BaseModel
{
    public function parent()
    {
        return $this->morphTo();
    }
}
