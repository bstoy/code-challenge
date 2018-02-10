<?php

namespace App\Services;

use App\Exceptions\UnexpectedResponseException;
use App\Models\Property;
use GuzzleHttp\Client;

class Geocode
{
    /**
     * Get coordinates for property from address
     *
     * @param Property $property
     * return array|null
     */
    public function getCoordinates(Property $property)
    {
        $url = sprintf(
            'https://maps.googleapis.com/maps/api/geocode/json?address=%s&key=%s',
            urlencode(implode(' ', [
                $property->address_1,
                $property->city,
                $property->post_code
            ])),
            config('services.google.api_key')
        );

        $client = new Client();
        $response = $client->get($url);
        $results = head(json_decode($response->getBody())->results);

        if (!$results) {
            throw new UnexpectedResponseException($response);
        }

        return $results->geometry->location;
    }
}
