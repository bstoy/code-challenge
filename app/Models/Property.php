<?php

namespace App\Models;

use App\Services\Geocode;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = ['id'];

    public function getGeocodesAttribute()
    {
        return (new Geocode())->getCoordinates($this);
    }
}
