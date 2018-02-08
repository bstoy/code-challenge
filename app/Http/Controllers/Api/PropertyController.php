<?php

namespace App\Http\Controllers\Api;

use App\Models\Property;
use App\Transformers\Api\PropertyTransformer;
use App\Http\Requests\Api\Property as Requests;

class PropertyController
{
    /**
     * Display a listing of properties.
     *
     * @param Requests\IndexRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Requests\IndexRequest $request)
    {
        return fractal()
            ->collection(Property::all())
            ->transformWith(new PropertyTransformer)
            ->respond();
    }

    /**
     * Display the specified property.
     *
     * @param Property $property
     * @param Requests\ShowRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Property $property, Requests\ShowRequest $request)
    {
        return fractal()
            ->item($property)
            ->transformWith(new PropertyTransformer)
            ->respond();
    }

    /**
     * Store the specified property.
     *
     * @param Requests\StoreRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Requests\StoreRequest $request)
    {
        $property = new Property;
        $property->fill($request->all())->save();

        return fractal()
            ->item($property)
            ->transformWith(new PropertyTransformer)
            ->respond();
    }

}
