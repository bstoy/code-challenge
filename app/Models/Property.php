<?php

namespace App\Models;

use App\Services\Geocode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Property extends Model
{
    protected $guarded = ['id'];

    public function getGeocodesAttribute()
    {
        if (is_null($geocodes = Cache::get($key = 'geocodes_' . $this->id))) {
            $geocodes = (new Geocode())->getCoordinates($this);

            Cache::put(
                $key,
                $geocodes,
                120
            );
        }

        return $geocodes;
    }
}
