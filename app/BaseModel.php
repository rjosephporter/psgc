<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = [];

    protected $hidden = ['id', 'created_at', 'updated_at' , 'geographic_level'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }

    public function setPopulationAttribute($value)
    {
        $this->attributes['population'] = (int) filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }
}
