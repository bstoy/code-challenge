Code Challenge - API with Google Maps API   
=======================

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
============

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
    



