<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucfirst($value);
    }
}