<?php

namespace App\Transformers\Api;

use App\Models\Property;
use League\Fractal\TransformerAbstract;

class PropertyTransformer extends TransformerAbstract
{

    /**
     * Turn this item object into a generic array
     *
     * @param Property $property
     * @return array
     */
    public function transform(Property $property)
    {
        return [
            'id' => $property->id,
            'address_1' => $property->address_1,
            'address_2' => $property->address_2,
            'city' => $property->city,
            'county' => $property->county,
            'country_code' => $property->country_code,
        ];
    }

}
