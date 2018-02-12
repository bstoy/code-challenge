Code Challenge - API with Google Maps API   
============================================

Backend Developer Code Challenge

Requirements:

This test allows you to demonstrate knowledge directly relevant to the work we do.
Try to write elegant code, like you would for a real project!


Build a simple application that holds a collection of properties in the database and exposes a
RESTful API to interact with them. The properties in the database simply consists on an address
at this point, but we should be able to add more information in the future.

The API should be able to:

    ● List all properties
    ● Retrieve a specific property
    ● Add a property, requiring only the address
    
All property objects returned by the API should include the property’s address, as well as its
latitude and longitude, which you should supplement using the Google Maps API.
Please use the Laravel framework as the basis for your application and Eloquent to interact with
the database. You may use an HTTP library to interact with the Google Maps API, please don’t
use a package specifically made for the Google Maps API though.


Requirements
============

* PHP >= 7.1

Includes
========

Laravel Passport for Authentication
https://github.com/laravel/passport

Fractal for Wrapping the Output
https://github.com/spatie/laravel-fractal


Usage
=====

Get geocodes for Address

    (new Geocode())->getCoordinates($this) returns {
                                                     "lat": XXXX,
                                                     "lng": XXXX,
                                                   }
    
API endpoints
=============

Authentication via Access Token
(check https://github.com/laravel/passport)

###### Header
    'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$accessToken,
        ],

#### Display one Property

    GET api/properties/{property}
    
##### Response

    {
        "data": {
            "id": 1,
            "address_1": "Flat 32l, Price Rue",
            "address_2": "Flat 03",
            "city": "Lake Sienna",
            "county": null,
            "country_code": "GB",
            "geocodes": {
                "lat": 51.5117038,
                "lng": -0.1571492
            }
        }
    }

#### List all Properties

    GET api/properties
    
##### Response

    {
        "data": [
            {
                "id": 1,
                "address_1": "Flat 32l, Price Rue",
                "address_2": "Flat 03",
                "city": "Lake Sienna",
                "county": null,
                "country_code": "GB",
                "geocodes": {
                    "lat": 51.5117038,
                    "lng": -0.1571492
                }
            },
            {
                ...
            },
            {
                ...
            },
            ...
        ]
    }
    
#### Store one Property

    POST api/properties 
    
##### Request      

Request parameter with validation rules

    'building_name' => 'nullable|string|max:60',
    'address_1' => 'required|string|max:60',
    'address_2' => 'nullable|string|max:60',
    'city' => 'required|string|max:40',
    'post_code' => 'required|string|max:8',
    'county' => 'nullable|string|max:60',
    'country_code' => 'required|string|size:2'
    
    
##### Response 

    {
        "data": {
            "id": 1,
            "address_1": "Flat 32l, Price Rue",
            "address_2": "Flat 03",
            "city": "Lake Sienna",
            "county": null,
            "country_code": "GB",
            "geocodes": {
                "lat": 51.5117038,
                "lng": -0.1571492
            }
        }
    }
    

