<?php

namespace App\Repositories;

use App\Models\Scrape\Vehicle;

class AvailableYearMakeModel
{
    /**
     * Available years, makes and models
     *
     * @return collection
     */
    public static function get()
    {
        return Vehicle::select('year', 'make', 'model')
        ->whereNull('deleted_at')
        ->distinct()
        ->orderBy('year', 'desc')
        ->get();
    }

    /**
     * Filter available years makes and models
     *
     * @var array $request
     *
     * @return collection
     */
    public static function filter($collection, $request)
    {
        return $collection->when($request->year, function ($collection) use ($request) {
            return $collection->where('year', $request->year);
        })->when($request->make, function ($collection) use ($request) {
            return $collection->where('make', $request->make);
        })->when($request->model, function ($collection) use ($request) {
            return $collection->where('model', $request->model);
        });
    }
}
